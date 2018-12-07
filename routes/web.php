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
Route::get('/catalogo','consultasController@viewProducto');


//-----------------------Aguirre


//-----------------------Alcala


//-----------------------Jorge
Route::post('detalles','consultasController@detalles');
Route::post('carrito', 'consultasController@carrito');

//-----------------------Favela
Route::get('/disenos','FavelaController@registrardisenos');
//Route::get('/storage',function (){
//    return storage_path();
//});
Route::post('/ingresardiseno','FavelaController@ingresardiseno');
Route::post('/prueba','FavelaController@ingresardiseno');