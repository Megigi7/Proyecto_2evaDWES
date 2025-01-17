<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Control_login extends Controller
{
    // funcion que obtiene el usuario y contraseña del formulario y busca en la base de datos si existe
    public function check_user(Request $request){
        $usuario = $request->input('user');
        $password = $request->input('password');
        $consulta = DB::table('empleado')->where('nombre', $usuario)->where('clave', $password)->get();
        if(count($consulta) > 0){
            return view('inicio');
        }else{
            return view('login', ['error' => 'Usuario o contraseña incorrectos', 'old_nombre' => $usuario]);
        }
    }
}
