<?php

namespace App\Http\Controllers;

class Control_view extends Controller
{
    // funcion que obtiene el usuario y contraseña del formulario y busca en la base de datos si existe
    public function login(){
        return view('login');
    }

    public function inicio(){
        return view('inicio');
    }


    public function confirmar_tarea($id){
        return view('confirmacion_tarea',['id'=>$id]);
    }

    public function confirmar_empleado($id){
        return view('confirmacion_empleado',['id'=>$id]);
    }

    public function confirmar_cliente($id){
        return view('confirmacion_cliente',['id'=>$id]);
    }

    public function confirmar_cuota($id){
        return view('confirmacion_cuota',['id'=>$id]);
    }

}
