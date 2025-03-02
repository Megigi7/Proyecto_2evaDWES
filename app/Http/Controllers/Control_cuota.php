<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuota;
use App\Models\Cliente;
use \Barryvdh\DomPDF\Facade\Pdf;
use \Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Conversor;
use Illuminate\Support\Facades\Validator;


class Control_cuota extends Controller
{
    public $opciones = ['No', 'Si', 'Indefinido'];
    public function getOpciones() {
        return $this->opciones;
    }
    /* Display a listing of the resource.*/
    public function index(){
        return view('cuotas', ['cuotas' => Cuota::all()]);
    }

    /* Show the form for creating a new resource. */
    public function create(){
        return view('form_cuota', ['tipo' => 'nueva',
                                    'clientes' => Cliente::all(),
                                    'opciones' => $this->getOpciones()]);
    }

    /* Store a newly created resource in storage. */
    public function store(Request $request){
        //recoger el dato "importe" y si tiene una , cambiarla por un .
        $importe = str_replace(',', '.', $request->input('importe'));
        $request->merge(['importe' => $importe]);
        
        $validator = Validator::make($request->all(), [
            'cliente' =>'required|max:11|exists:cliente,id',
            'concepto' =>'required|max:255',
            'fecha_emision' =>'required|date',
            'importe' =>'required|numeric|min:0|max:9999999999.99',
            'pagada' =>'required|max:20|in:'. implode(',', $this->getOpciones()),
            'fecha_pago' =>'max:50',
            'notas' =>'max:65535',
        ],
        [
            'required' => 'El campo :attribute es obligatorio.',
            'exists' => 'El cliente seleccionado no existe.',
            'max' => 'El campo :attribute no puede tener más de :max caracteres.',
            'numeric' => 'El campo :attribute debe ser un número.',
            'min' => 'El campo :attribute debe ser al menos :min.',
            'date' => 'El campo :attribute debe ser una fecha válida.',
        ]);
        
        if ($validator->fails()) {
            // return response()->json([
            //     'status' => 'error',
            //     'errors' => $validator->errors()->all()
            // ], 422);

            return redirect()->back()->withErrors($validator)->withInput();
        }
        $cliente = Cliente::find($request->cliente);
        $conversor = new Conversor();
        $conversion = $conversor->convertToEuro($cliente->moneda, $request->importe);

        Cuota::create([
            'cliente' => $request->cliente,
            'concepto' => $request->concepto,
            'fecha_emision' => $request->fecha_emision,
            'importe' => $request->importe,
            'pagada' => $request->pagada,
            'fecha_pago' => $request->fecha_pago,
            'importe_EUR' => $conversion,
            'notas' => $request->notas,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('cuota.index')->with('success', 'Cuota creada correctamente.');
        
    }

    /** Display the specified resource.*/
    public function show(string $id){
        //crear factura y enviar por correo
        // $cuota = Cuota::find($id);
        // $cliente = Cliente::find($cuota->cliente);
        // $pdf = \PDF::loadView('factura', ['cuota' => $cuota, 'cliente' => $cliente]);
        // return $pdf->download('factura.pdf');

    }

    /* Show the form for editing the specified resource.*/
    public function edit(string $id){
        return view('form_cuota', ['tipo' => 'modificar',
                                   'clientes' => Cliente::all(),
                                   'opciones' => $this->getOpciones(),
                                   'cuota' => Cuota::find($id)]);
    }

    /* Update the specified resource in storage. */
    public function update(Request $request, string $id){
        $request->validate([
            'cliente' => 'required|max:11|exists:cliente,id', 
            'concepto' => 'required|max:255',
            'fecha_emision' => 'required|date',
            'importe' => 'required|numeric|min:0|max:9999999999.99',
            'pagada' => 'required|max:20|in:' . implode(',', $this->getOpciones()),
            'fecha_pago' => 'max:50',
            'notas' => 'max:65535',
        ]);
        $cliente = Cliente::find($request->cliente);
        $conversor = new Conversor();
        $conversion = $conversor->convertToEuro($cliente->moneda, $request->importe);

        $data = [
            'cliente' => $request->cliente,
            'concepto' => $request->concepto,
            'fecha_emision' => $request->fecha_emision,
            'importe' => $request->importe,
            'pagada' => $request->pagada,
            'fecha_pago' => $request->fecha_pago,
            'importe_EUR' => $conversion,
            'notas' => $request->notas,
        ];
        
        Cuota::updateCuota($id, $data);

        // Redirigir con un mensaje de éxito
        return redirect()->route('cuota.index')->with('success', 'Cuota modificada correctamente.');
    }

    /* Remove the specified resource from storage.*/
    public function destroy(string $id){
        Cuota::deleteCuota($id);
        return redirect()->route('cuota.index')->with('success', 'Cuota eliminada correctamente.');
    }

    public function remesa(Request $concepto){
        $concepto->validate([
            'concepto' => 'required|string|max:255'
        ]);
        $conversor = new Conversor();
        $users = Cliente::all();
        foreach ($users as $user) {
            $conversion = $conversor->convertToEuro($user->moneda, $user->importe_cuota_mensual);
            Cuota::create([
                'cliente' => $user->id,
                'concepto' => $concepto->concepto,
                'fecha_emision' => now(),
                'importe' => $user->importe_cuota_mensual,
                'pagada' => "No",
                'fecha_pago' => null,
                'importe_EUR' => $conversion,
                'notas' => null,
            ]);        
            
        }
        return redirect()->route('cuota.index')->with('success', 'Remesa procesada correctamente. Se han creado las cuotas.');        // return $this->index();
    }

    public function crearFactura(string $id){
        $cuota = Cuota::find($id);
        $cliente = Cliente::find($cuota->cliente);
        
        // Generate PDF
        $pdf = PDF::loadView('template_pdf', [
            'cuota' => $cuota,
            'cliente' => $cliente
        ]);

        // Send email with PDF attachment
        Mail::send('template_mail', ['cliente' => $cliente], function($message) use ($pdf, $cliente, $cuota) {
            $message->to($cliente->correo)
                    ->subject('Factura ' . $cuota->concepto)
                    ->attachData($pdf->output(), 'factura.pdf');
        });

        // Return PDF for preview
        return $pdf->stream('factura.pdf');
    }


}
