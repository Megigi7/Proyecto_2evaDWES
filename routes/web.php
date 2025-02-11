<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Control_login;
use App\Http\Controllers\Control_view;
use App\Http\Controllers\Control_tarea;
use App\Http\Controllers\Control_empleado;

//login
Route::get('/', [Control_view::class, 'login']);
Route::get('/login', [Control_view::class, 'login']);
Route::post('/login', [Control_login::class, 'check_user']);

//inicio
Route::get('/inicio', [Control_view::class, 'inicio']);


//tareas
Route::resource('tarea', Control_tarea::class);
//confirmar borrado
Route::get('/confirmar_tarea/{id}', [Control_view::class, 'confirmar_tarea'] );


//empleado
Route::resource('empleado', Control_empleado::class);
//confirmar borrado
Route::get('/confirmar_empleado/{id}', [Control_view::class, 'confirmar_empleado'] );
