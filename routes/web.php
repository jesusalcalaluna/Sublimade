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


Route::post('/slider1','Controller@slider1');
Route::post('/slider2','Controller@slider2');
Route::post('/slider3','Controller@slider3');
Route::post('/slider4','Controller@slider4');
Route::post('/destacado1','Controller@destacado1');
Route::post('/destacado2','Controller@destacado2');
Route::post('/destacado3','Controller@destacado3');
Route::post('/destacado4','Controller@destacado4');
Route::get('/inicio.mod', function () {
    return view('inicio.modificar-inicio');
});
Route::get('twitter', 'consultasControllerInicio@twitter');
Route::get('instagram', 'consultasControllerInicio@instagram');
Route::get('facebook', 'consultasControllerInicio@facebook');
Route::get('whatsapp', 'consultasControllerInicio@whatsapp');
//-----------------------Usuarios
Route::get('/registro.usuario','Usuario@registro');
Route::get('/registro.usuario', function () {
    return view('inicio.registro-usuario');
});

//-----------------------Tienda
Route::get('/catalogo','ControllerProducto@viewProducto');
Route::post('detalles','ControllerProducto@detalles');
Route::post('carrito', 'consultasController@carrito');
Route::post('finalizarCompra','consultasController@finalizarcompra');
Route::post('generarPedido','consultasController@generarPedido');


//-----------------------Aguirre


//-----------------------Alcala
Route::get('/tipo_producto','ControllerTipo_Producto@GetTipos_producto');

//-----------------------Jorge



//-----------------------Favela
Route::get('/disenos','FavelaController@registrardisenos');
Route::get('/verdisenos','FavelaController@verdisenos');
Route::post('/ingresardiseno','FavelaController@ingresardiseno');



//generar key en dropbox
//