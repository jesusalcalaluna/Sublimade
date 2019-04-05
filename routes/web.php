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



//--------------------Incio administrador


//----------------------------------------


Route::get('twitter', 'ControllerInicio@twitter');
Route::get('instagram', 'ControllerInicio@instagram');
Route::get('facebook', 'ControllerInicio@facebook');
Route::get('whatsapp', 'ControllerInicio@whatsapp');


//-----------------------Usuarios

Route::get('/registro.usuario', function () {
    return view('inicio.registro-usuario');
});
Route::post('/registro.usuario','ControllerUsuario@register');


Route::get('/cerrar','ControllerUsuario@cerrar');
Route::get('modificarInfo','ControllerUsuario@modificarInfoView');
Route::post('actualizarinfo','ControllerUsuario@actualizarInfo');
Route::get('misPedidos', 'ControllerPedido@getPedidoUsuario');

//-----------------------Tienda
Route::get('/catalogo','ControllerProducto@viewProducto');
Route::post('/catalogo','ControllerProducto@filtro');

Route::post('detalles','ControllerProducto@detalles');
Route::post('carrito', 'ControllerCarro@carritoView');
Route::post('finalizarCompra','ControllerCarro@finalizarCompra');
Route::get('generarPedido','ControllerPedido@generarPedido');
Route::get('carrito','ControllerCarro@carritoVacio');
Route::post('eliminarProducto','ControllerCarro@eliminarProducto');

//-----------------------restringirrutas

Route::group(['middleware' => 'usuarioAdmin'], function () {
Route::get('regadmin','ControllerUsuario@registraradmins')->middleware('usuarioStandard');
Route::post('regadmin','ControllerUsuario@cambioprivilegio')->middleware('usuarioStandard');
Route::get('getadmin','ControllerUsuario@getadmins')->middleware('usuarioStandard');
Route::post('filtroadmin','ControllerUsuario@filtrogetadmins')->middleware('usuarioStandard');
Route::get('/verdisenos','ControllerDiseno@getdisenos');
Route::get('/verpedidos','ControllerPedido@verpedidos')->middleware('usuarioStandard');
Route::get('/vernombres','ControllerDiseno@getnombresdisenos');
Route::get('/ventas','ControllerPedido@getreporteventas')->middleware('usuarioStandard');
Route::post('/clientesfiltrados','ControllerPedido@getclientesfiltrados')->middleware('usuarioStandard');
Route::post('/disenosfiltrados','ControllerDiseno@getdisenosfiltrados');
Route::post('/cargardiseno','ControllerDiseno@cargardiseno');
Route::get('/admin', function () {
    return view('admin.modificar-inicio');
});
Route::get('/pedidospen','ControllerPedido@getpedidopendiente');
Route::get('/pedidospro','ControllerPedido@getpedidoenproceso');
Route::get('/pedidosfin','ControllerPedido@getpedidofinalizado');

Route::post('/slider1','Controller@slider1');
Route::post('/slider2','Controller@slider2');
Route::post('/slider3','Controller@slider3');
Route::post('/slider4','Controller@slider4');
Route::post('/destacado1','Controller@destacado1');
Route::post('/destacado2','Controller@destacado2');
Route::post('/destacado3','Controller@destacado3');
Route::post('/destacado4','Controller@destacado4');


});

Route::group(['middleware' => 'usuarioStandard'], function () {


});
//-----------------------Alcala
Route::get('/tipo_producto','ControllerTipo_Producto@GetTipos_producto');

//-----------------------Jorge


//-----------------------Favela

Route::get('/test','ControllerPedido@pdf');
Route::post('/grafica','ControllerPedido@getgrafica');

//---------------------Androi
Route::get('/android/catalogo','ControllerProducto@androidCatalogo');
Route::post('/android/detalles', 'ControllerProducto@androidDetalles');
Route::post('/registro.android','ControllerUsuario@android');
Route::get('/registro.usuario.androidv','ControllerUsuario@validaciondeusuario');

