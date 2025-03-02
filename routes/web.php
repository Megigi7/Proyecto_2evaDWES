<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Control_view;
use App\Http\Controllers\Control_tarea;
use App\Http\Controllers\Control_empleado;
use App\Http\Controllers\Control_cliente;
use App\Http\Controllers\Control_cuota;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\CheckRole;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// INCIDENCIAS PARA CLIENTES
Route::get('/incidencia', [Control_tarea::class, 'incidencia'])->name('tarea.incidencia');
Route::post('/incidencia', [Control_tarea::class, 'new_incidencia']);

// API
// Route::apiResource('tarea', Control_tarea::class);
// Route::apiResource('cliente', Control_cliente::class);
// Route::apiResource('empleado', Control_empleado::class);
// Route::apiResource('cuota', Control_cuota::class);


Route::group(['middleware' => ['auth']], function () {
    Route::get('/inicio', [Control_view::class, 'inicio']);
    Route::put('/tarea/{id}/completar', [Control_tarea::class, 'completar'])->name('tarea.completar'); 
    Route::get('/empleado/{id}/cuenta', [Control_empleado::class, 'ver_tu_cuenta'])->name('empleado.cuenta');  
    Route::put('/empleado/{id}/cuenta', [Control_empleado::class, 'actualiza_tu_cuenta'])->name('empleado.cuenta');    
    Route::resource('tarea', Control_tarea::class);

    Route::middleware([CheckRole::class . ':admin'])->group(function () {
        // Rutas solo accesibles para administradores
        Route::resource('cliente', Control_cliente::class);
        Route::resource('empleado', Control_empleado::class);
        Route::post('/cuota/remesa', [Control_cuota::class, 'remesa'])->name('cuota.remesa');
        Route::resource('cuota', Control_cuota::class);

                    
        Route::get('/confirmar_tarea/{id}', [Control_view::class, 'confirmar_tarea']);
        Route::get('/confirmar_empleado/{id}', [Control_view::class, 'confirmar_empleado']);
        Route::get('/confirmar_cliente/{id}', [Control_view::class, 'confirmar_cliente']);
        Route::get('/confirmar_cuota/{id}', [Control_view::class, 'confirmar_cuota']);

        Route::get('/cuota/{id}/factura', [Control_cuota::class, 'crearFactura'])->name('cuota.factura');

    });

});


