<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//--------Modelos
use App\Carrito;
use App\Categoria;
use App\Cliente;
use App\Detalle_pedido;
use App\Diseno;
use App\Diseno_cliente;
use App\Empleado;
use App\Entrada;
use App\Inventario;
use App\Material;
use App\Pedido;
use App\Persona;
use App\Producto;
use App\Proveedor;
use App\Proveedor_material;
use App\Salida;
use App\Tipos_producto;
use App\User;
use App\Usuario;
//------------------

class ControllerPedido extends Controller
{
    function getpedidopendiente(){
    	$pedidos= Pedido::where('estado','=','pendiente');
    	dd($pedidos);
    	//return view('admin.pedidos')->with('pedidos', $pedidos);
    }
    function getpedidoenproceso(){
    	$pedidos= Pedido::where('estado','=','EN PROCESO');
    	return view('admin.pedidos')->with('pedidos', $pedidos);
    }
    function getpedidofinalizado(){
    	$pedidos= Pedido::where('estado','=','FINALIZADO');
    	return view('admin.pedidos')->with('pedidos', $pedidos);
    }
}
