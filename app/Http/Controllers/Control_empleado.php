<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\User;

class Control_empleado extends Controller
{
    public $tipos = ['user', 'admin'];
    public function getTipos() {
        return $this->tipos;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('empleados', ['empleados' => Empleado::all(),
                                ]);
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
            'clave' => 'required|max:255|min:8',
            'telefono' => 'required|max:50|unique:empleado,telefono',
            'direccion' => 'required|max:65535',
            'tipo_user' => 'required|max:50|in:' . implode(',', $this->getTipos()),
            'fecha_alta' =>'required|datetime',
        ]);

        Empleado::create([
            'dni' => $request->dni,
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'fecha_alta' => $request->fecha_alta,
        ]);

        User::create([
            'id' => Empleado::latest()->first()->id,
            'name' => $request->nombre,
            'email' => $request->correo,
            'password' => $request->clave,
            'role' => $request->tipo_user,
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
            'clave' => 'required|max:255|min:8',
            'telefono' => 'required|max:50',
            'direccion' => 'required|max:65535',
            'tipo_user' => 'required|max:50|in:' . implode(',', $this->getTipos()),
            'fecha_alta' =>'required|datetime',
        ]);

        $data = [
            'dni' => $request->dni,
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'fecha_alta' => $request->fecha_alta];

        Empleado::updateEmpleado($id, $data);

        $user = User::find($id);
        $user->name = $request->nombre;
        $user->email = $request->correo;
        $user->password = $request->clave;
        $user->role = $request->tipo_user;
        $user->save();

        return redirect()->back()->with('success', 'Datos de empleado actualizados correctamente.');
    }

    /** Remove the specified resource from storage.*/
    public function destroy(string $id){
        Empleado::deleteEmpleado($id);
        return redirect()->route('empleado.index')->with('success', 'Empleado eliminado correctamente.');
    }

    public function ver_tu_cuenta(string $id){
        return view('form_empleado', ['tipo' => 'modif',
                                      'empleado' => Empleado::find($id),]);
    }

    public function actualiza_tu_cuenta(Request $request, string $id){
        $request->validate([
            'nombre' => 'required|max:255',
            'correo' => 'required|max:255|email',
            'telefono' => 'required|max:50',
            'direccion' => 'required|max:65535',
            'fecha_alta' => 'required|date',
        ]);
        $empleado = Empleado::findOrFail($id);

        $empleado -> update([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'fecha_alta' => $request->fecha_alta]);

        $user = User::find($id);
        $user->name = $request->nombre;
        $user->email = $request->correo;
        $user->save();

        return redirect()->back()->with('success', 'Datos actualizados correctamente.');
        
    }


}
