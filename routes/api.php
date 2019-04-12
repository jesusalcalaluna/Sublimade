<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/registro.android','ControllerUsuario@android');
Route::post('/android.iniciarsession', 'ControllerUsuario@iniciarsessionandroid');
Route::post('/android.iniciarsession.google', 'ControllerUsuario@obtenerusuarioandroidgoogle');

//Rutas de editar perfil y filtros
Route::post('/android.obtenerusuario','ControllerUsuario@obtenerusuarioandroid');
Route::post('/android.modificarusuario','ControllerUsuario@actualizarInfoandroid');

