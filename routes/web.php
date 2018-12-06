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
//---------------------- Principal
Route::get('/', function () {
    return view('inicio.inicio');
});
Route::get('/inicio.sesion', function () {
    return view('inicio.inicio-sesion');
});
Route::get('/registro.usuario', function () {
    return view('inicio.registro-usuario');
});

//-----------------------Tienda
Route::get('/catalogo', function () {
    return view('catalogo');
});

//-----------------------Aguirre


//-----------------------Alcala


//-----------------------Jorge


//-----------------------Favela
Route::get('/personalizar', function(){
   return view('index');
});