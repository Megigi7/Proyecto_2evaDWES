<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Tarea;
use App\Models\Provincia;
use App\Models\Estado;


class Control_tarea extends Controller
{
    /* Display a listing of the resource.*/
    public function index(){
        return view('tareas', ['tareas' => Tarea::all()]);
    }

    /* Show the form for creating a new resource.*/
    public function create(){
        //recoger de la base de datos los datos de la tabla cliente y empleados y pasarlo como parametro a la vista
        return view('form_tarea', ['tipo' => 'nueva',
                                   'clientes' => Cliente::all(),
                                   'empleados' => Empleado::all(), 
                                   'provincias' => Provincia::getAllProvincias(),
                                   'estados' => Estado::getAllEstados()]);
    }

    /* Store a newly created resource in storage.*/
    public function store(Request $request){
        //validar los datos del formulario
        $request->validate([
            'cliente' => 'required|max:255|exists:cliente,id', 
            'nombre_cliente' => 'required|string|max:255',
            'tel_s_contacto' => 'required|string|max:50',
            'correo' => 'required|max:255|string|email',
            'descripcion' => 'required|string|max:65535',
            'direccion' => 'required|string|max:65535',
            'poblacion' => 'required|string|max:100',
            'codigo_postal' => 'required|string|max:20',
            'provincia' => 'required|max:100|exists:provincia,codigo',
            'estado' => 'required|max:50|exists:estado,clave',
            'empleado' => 'required|max:11|exists:empleado,id',
            'fecha_realizacion' => 'required|date',
            'anotaciones_anteriores' => 'max:65535|string',
            'anotaciones_posteriores' => 'max:65535|string',
            'ficheros'=> 'max:65535',
        ]);

        Tarea::create([
            'cliente' => $request->cliente, 
            'nombre_cliente' => $request->nombre_cliente,
            'tel_contacto' => $request->tel_s_contacto,
            'correo' => $request->correo,
            'descripcion' => $request->descripcion,
            'direccion' => $request->direccion,
            'poblacion' => $request->poblacion,
            'codigo_postal' => $request->codigo_postal,
            'provincia' => $request->provincia,
            'estado' => $request->estado,
            'empleado' => $request->empleado,
            'fecha_realizacion' => $request->fecha_realizacion,
            'anotaciones_anteriores' => $request->anotaciones_anteriores,
            'anotaciones_posteriores' => $request->anotaciones_posteriores,
            'ficheros'=> $request->ficheros
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Tarea creada correctamente.');
    }

    /* Display the specified resource. */
    public function show(string $id){
        //depende del id, se muestra la tarea de dicho id
        return view('detalles_tarea', ['tarea' => Tarea::find($id),
                                'estado' => Estado::getEstadoByClave(Tarea::find($id)->estado),
                                'cliente' => Cliente::find(Tarea::find($id)->cliente),
                                'provincia' => Provincia::getProvinciaByCod(Tarea::find($id)->provincia),
                                'empleado' => Empleado::find(Tarea::find($id)->empleado)]);
    }

    /* Show the form for editing the specified resource. */
    public function edit(string $id){
        //mostramos el formulario de edicion de la tarea especificada
        return view('form_tarea', ['tipo' => 'modificar',
                                   'tarea' => Tarea::find($id),
                                   'clientes' => Cliente::all(),
                                   'empleados' => Empleado::all(), 
                                   'provincias' => Provincia::all(),
                                   'estados' => Estado::all()]);
    }

    /* Update the specified resource in storage. */
    public function update(Request $request, string $id){
        $request->validate([
            'cliente' => 'required|max:255|exists:cliente,id', 
            'nombre_cliente' => 'required|string|max:255',
            'tel_s_contacto' => 'required|string|max:50',
            'correo' => 'required|max:255|string|email',
            'descripcion' => 'required|string|max:65535',
            'direccion' => 'required|string|max:65535',
            'poblacion' => 'required|string|max:100',
            'codigo_postal' => 'required|string|max:20',
            'provincia' => 'required|max:100|exists:provincia,codigo',
            'estado' => 'required|max:50|exists:estado,clave',
            'empleado' => 'required|max:11|exists:empleado,id',
            'fecha_realizacion' => 'required|date',
            'anotaciones_anteriores' => 'max:65535|string',
            'anotaciones_posteriores' => 'max:65535|string',
            'ficheros'=> 'max:65535',
        ]);
        
        $data = [
            'cliente' => $request->cliente,  // Enviar cliente en la inserción
            'nombre_cliente' => $request->nombre_cliente,
            'tel_contacto' => $request->tel_s_contacto,
            'correo' => $request->correo,
            'descripcion' => $request->descripcion,
            'direccion' => $request->direccion,
            'poblacion' => $request->poblacion,
            'codigo_postal' => $request->codigo_postal,
            'provincia' => $request->provincia,
            'estado' => $request->estado,
            'empleado' => $request->empleado,
            'fecha_realizacion' => $request->fecha_realizacion,
            'anotaciones_anteriores' => $request->anotaciones_anteriores,
            'anotaciones_posteriores' => $request->anotaciones_posteriores,
            'ficheros'=> $request->ficheros
        ];

        //modificamos la tarea especificada
        Tarea::updateTarea($id, $data);
        return redirect()->back()->with('success', 'Tarea actualizada correctamente.');
    }

    /* Remove the specified resource from storage. */
    public function destroy(string $id){
        //después de confirmación, se elimina la tarea especificada
        Tarea::deleteTarea($id);
        return redirect()->route('tarea.index')->with('success', 'Tarea eliminada correctamente.');
    }
}
