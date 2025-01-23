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
        return view('tareas', ['tareas' => Tarea::getAllTareas()]);
    }

    /* Show the form for creating a new resource.*/
    public function create(){
        //recoger de la base de datos los datos de la tabla cliente y empleados y pasarlo como parametro a la vista
        return view('form_tarea', ['tipo' => 'nueva',
                                   'clientes' => Cliente::getAllClients(),
                                   'empleados' => Empleado::getAllEmpleados(), 
                                   'provincias' => Provincia::getAllProvincias(),
                                   'estados' => Estado::getAllEstados()]);
    }

    /* Store a newly created resource in storage.*/
    public function store(Request $request){
        //validar los datos del formulario
        $request->validate($request, [
            'cif_nif' => 'required|max:255',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
        ]);

        //si pasan la validacion, se crea un nuevo objeto tarea y se guarda en la base de datos

    }

    /* Display the specified resource. */
    public function show(string $id){
        //depende del id, se muestra la tarea de dicho id
        return view('detalles', ['tarea' => Tarea::getTareaById($id),
                    //estado / cliente / provincia 
                    
        ]);
    }

    /* Show the form for editing the specified resource. */
    public function edit(string $id){
        //mostramos el formulario de edicion de la tarea especificada
        return view('form_tarea', ['tipo' => 'modificar',
                                   'tarea' => Tarea::getTareaById($id),
                                   'clientes' => Cliente::getAllClients(),
                                   'empleados' => Empleado::getAllEmpleados(), 
                                   'provincias' => Provincia::getAllProvincias(),
                                   'estados' => Estado::getAllEstados()]);
    }

    /* Update the specified resource in storage. */
    public function update(Request $request, string $id){
        //modificamos la tarea especificada
    }

    /* Remove the specified resource from storage. */
    public function destroy(string $id){
        //después de confirmación, se elimina la tarea especificada
    }
}
