<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;


class Control_cliente extends Controller
{

    /* Display a listing of the resource. */
    public function index(){
        return view('clientes', ['clientes' => Cliente::all()]);
    }

    /* Show the form for creating a new resource. */
    public function create(){
        return view('form_cliente', ['tipo' => 'nueva',]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'dni' => 'required|max:255|unique:cliente,cif', 
            'nombre' => 'required|max:255',
            'telefono' => 'required|max:50|unique:cliente,telefono',
            'correo' => 'required|max:255|email|unique:cliente,correo',
            'cuenta_corriente' => 'required|max:255|unique:cliente,cuenta_corriente',
            'pais' => 'required|max:100',
            'moneda' => 'required|max:50',
            'importe' => 'required|numeric'
        ]);

        Cliente::create([
            'cif' => $request->dni,
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'cuenta_corriente' => $request->cuenta_corriente,
            'pais' => $request->pais,
            'moneda' => $request->moneda,
            'importe_cuota_mensual' => $request->importe
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Cliente añadido correctamente.');
    
    }

    /**Display the specified resource.*/
    // public function show(string $id){
    //     //
    // }

    /** Show the form for editing the specified resource.*/
    public function edit(string $id){
        return view('form_cliente', ['tipo' => 'modificar',
                                     'cliente' => Cliente::find($id)]); 
    }

    /** Update the specified resource in storage.*/
    public function update(Request $request, string $id){
        $request->validate([
            'dni' => 'required|max:255', 
            'nombre' => 'required|max:255',
            'telefono' => 'required|max:50',
            'correo' => 'required|max:255|email',
            'cuenta_corriente' => 'required|max:255',
            'pais' => 'required|max:100',
            'moneda' => 'required|max:50',
            'importe' => 'required|numeric'
        ]);

        $data = [
            'cif' => $request->dni,
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'cuenta_corriente' => $request->cuenta_corriente,
            'pais' => $request->pais,
            'moneda' => $request->moneda,
            'importe_cuota_mensual' => $request->importe
        ];

        Cliente::updatecliente($id, $data);
        return redirect()->back()->with('success', 'Datos de cliente actualizados correctamente.');
    }

    /** Remove the specified resource from storage.*/
    public function destroy(string $id){
        Cliente::deletecliente($id);
        return redirect()->route('cliente.index')->with('success', 'Cliente eliminado correctamente.');
    }
}
