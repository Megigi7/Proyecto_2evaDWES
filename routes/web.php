<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Control_login;


Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});


Route::post('/login', [Control_login::class, 'check_user']);
