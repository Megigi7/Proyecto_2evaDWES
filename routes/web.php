<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Control_login;
use App\Http\Controllers\Control_view;
use App\Http\Controllers\Control_tarea;

//login
Route::get('/', [Control_view::class, 'login']);
Route::get('/login', [Control_view::class, 'login']);
Route::post('/login', [Control_login::class, 'check_user']);

//inicio
Route::get('/inicio', [Control_view::class, 'inicio']);

//tarea
// Route::get('/tareas', [Control_view::class, 'tareas']);

//tareas
Route::resource('tarea', Control_tarea::class);


