<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuota;
use App\Models\Cliente;

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
        
        $request->validate([
            'cliente' => 'required|max:11|exists:cliente,id', 
            'concepto' => 'required|max:255',
            'fecha_emision' => 'required|date',
            'importe' => 'required|max:11',
            'pagada' => 'required|max:20|in:' . implode(',', $this->getOpciones()),
            'fecha_pago' => 'max:50',
            'notas' => 'max:65535',
        ]);

        Cuota::create([
            'cliente' => $request->cliente,
            'concepto' => $request->concepto,
            'fecha_emision' => $request->fecha_emision,
            'importe' => $request->importe,
            'pagada' => $request->pagada,
            'fecha_pago' => $request->fecha_pago,
            'notas' => $request->notas,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Cuota creada correctamente.');
        
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
        $importe = str_replace(',', '.', $request->input('importe'));
        $request->merge(['importe' => $importe]);
        
        $request->validate([
            'cliente' => 'required|max:11|exists:cliente,id', 
            'concepto' => 'required|max:255',
            'fecha_emision' => 'required|date',
            'importe' => 'required|max:11',
            'pagada' => 'required|max:20|in:' . implode(',', $this->getOpciones()),
            'fecha_pago' => 'max:50',
            'notas' => 'max:65535',
        ]);

        $data = [
            'cliente' => $request->cliente,
            'concepto' => $request->concepto,
            'fecha_emision' => $request->fecha_emision,
            'importe' => $request->importe,
            'pagada' => $request->pagada,
            'fecha_pago' => $request->fecha_pago,
            'notas' => $request->notas,
        ];
        
        Cuota::updateCuota($id, $data);

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Cuota modificada correctamente.');   
    }

    /* Remove the specified resource from storage.*/
    public function destroy(string $id){
        Cuota::deleteCuota($id);
        return redirect()->route('cuota.index')->with('success', 'Cuota eliminada correctamente.');
    }
}
