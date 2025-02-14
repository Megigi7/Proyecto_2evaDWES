<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Control_login;
use App\Http\Controllers\Control_view;
use App\Http\Controllers\Control_tarea;
use App\Http\Controllers\Control_empleado;
use App\Http\Controllers\Control_cliente;
use App\Http\Controllers\Control_cuota;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// //login
// Route::get('/', [Control_view::class, 'login']);
// Route::get('/login', [Control_view::class, 'login']);
// Route::post('/login', [Control_login::class, 'check_user']);

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


//cliente
Route::resource('cliente', Control_cliente::class);
//confirmar borrado
Route::get('/confirmar_cliente/{id}', [Control_view::class, 'confirmar_cliente'] );

//cuota
Route::resource('cuota', Control_cuota::class);
//confirmar cuota
Route::get('/confirmar_cuota/{id}', [Control_view::class, 'confirmar_cuota'] );

