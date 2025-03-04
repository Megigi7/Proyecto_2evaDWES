<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('users','Api\UserController@index');



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// // API Routes
// Route::group(['prefix' => 'v1'], function() {
//     // Public routes
    
//     // Protected routes
//     Route::group(['middleware' => ['auth:sanctum']], function() {
        
//     });
// });
