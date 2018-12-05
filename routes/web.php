<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});
Route::get('/inisio.sesion', function () {
    return view('inicio-sesion');
});
Route::get('/registro.usuario', function () {
    return view('registro-usuario');
});
Route::get('/catalogo', function () {
    return view('catalogo');
});
