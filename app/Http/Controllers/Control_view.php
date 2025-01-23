<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Control_view extends Controller
{
    // funcion que obtiene el usuario y contraseña del formulario y busca en la base de datos si existe
    public function login(){
        return view('login');
    }

    public function inicio(){
        return view('inicio');
    }

    public function tareas(){
        return view('tareas');
    }

    
    public function nueva(){
        return view('añadir');
    }
}
