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
    return view('inicio.Inicio');
});

Route::get('/inicio.sesion', function () {
    return view('inicio.inicio-sesion');
});
Route::post('/inicio.sesion','ControllerUsuario@iniciarsession');

Route::post('/inicio.mod','inicio@actualizar');
Route::get('/inicio.mod', function () {
    return view('inicio.modificar-inicio');
});
//-----------------------Usuarios

Route::get('/registro.usuario', function () {
    return view('inicio.registro-usuario');
});
Route::post('/registro.usuario','ControllerUsuario@register');

Route::get('/cerrar','ControllerUsuario@cerrar');


//-----------------------Tienda
Route::get('/catalogo','ControllerProducto@viewProducto');
Route::post('detalles','ControllerProducto@detalles');


//-----------------------restringirrutas

 Route::group(['middleware' => 'usuarioAdmin'], function () {



});


Route::group(['middleware' => 'usuarioStandard'], function () {



});

//-----------------------Alcala
Route::get('/tipo_producto','ControllerTipo_Producto@GetTipos_producto');

//-----------------------Jorge

Route::post('carrito', 'consultasController@carrito');

//-----------------------Favela
Route::get('/disenos','FavelaController@registrardisenos');
Route::get('/verdisenos','FavelaController@verdisenos');
Route::post('/ingresardiseno','FavelaController@ingresardiseno');
