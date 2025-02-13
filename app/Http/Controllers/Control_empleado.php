<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class Control_empleado extends Controller
{
    public $tipos = ['Operario', 'Administrador'];
    public function getTipos() {
        return $this->tipos;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('empleados', ['empleados' => Empleado::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('form_empleado', ['tipo' => 'nueva',
                                      'tipos' => $this->tipos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'dni' => 'required|max:20|unique:empleado,dni', 
            'nombre' => 'required|max:255',
            'correo' => 'required|max:255|email|unique:empleado,correo',
            'usuario' => 'required|max:100|unique:empleado,usuario',
            'clave' => 'required|max:255',
            'telefono' => 'required|max:50|unique:empleado,telefono',
            'direccion' => 'required|max:65535',
            'tipo_user' => 'required|max:50|in:' . implode(',', $this->getTipos())
        ]);

        Empleado::create([
            'dni' => $request->dni,
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'usuario' => $request->usuario,
            'clave' => $request->clave,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'tipo' => $request->tipo_user
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Empelado añadido correctamente.');
    
    }

    /**Display the specified resource.*/
    // public function show(string $id){
    //     //
    // }

    /** Show the form for editing the specified resource.*/
    public function edit(string $id){
        return view('form_empleado', ['tipo' => 'modificar',
                                      'empleado' => Empleado::find($id),
                                      'tipos' => $this->tipos]);
    }

    /** Update the specified resource in storage.*/
    public function update(Request $request, string $id){
        $request->validate([
            'dni' => 'required|max:20', 
            'nombre' => 'required|max:255',
            'correo' => 'required|max:255|email',
            'usuario' => 'required|max:100',
            'clave' => 'required|max:255',
            'telefono' => 'required|max:50',
            'direccion' => 'required|max:65535',
            'tipo_user' => 'required|max:50|in:' . implode(',', $this->getTipos())
        ]);

        $data = [
            'dni' => $request->dni,
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'usuario' => $request->usuario,
            'clave' => $request->clave,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'tipo' => $request->tipo_user];

        Empleado::updateEmpleado($id, $data);
        return redirect()->back()->with('success', 'Datos de empleado actualizados correctamente.');
    }

    /** Remove the specified resource from storage.*/
    public function destroy(string $id){
        Empleado::deleteEmpleado($id);
        return redirect()->route('empleado.index')->with('success', 'Empleado eliminado correctamente.');
    }
}
