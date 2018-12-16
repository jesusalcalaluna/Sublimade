<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
use Illuminate\Support\Facades\DB;
use Session;

//------------------

class ControllerPedido extends Controller
{
    function getpedidopendiente(){

    	//$pedidos= Pedido::where('estado','=','PENDIENTE')->get();
        $pedidos=DB::table('personas')
        ->join('clientes','personas.id_persona','=','clientes.id_persona','inner')
        ->join('pedidos','clientes.id_cliente','=','pedidos.id_cliente','inner')
        ->where('pedidos.estado','=','PENDIENTE')
        ->get();
    	return view('admin.pedidos')->with('pedidos', $pedidos);

    }
    function getpedidoenproceso(){

        $pedidos=DB::table('personas')
        ->join('clientes','personas.id_persona','=','clientes.id_persona','inner')
        ->join('pedidos','clientes.id_cliente','=','pedidos.id_cliente','inner')
        ->where('pedidos.estado','=','EN PROCESO')
        ->get();
    	return view('admin.pedidos')->with('pedidos', $pedidos);
    }
    function getpedidofinalizado(){

        $pedidos=DB::table('personas')
        ->join('clientes','personas.id_persona','=','clientes.id_persona','inner')
        ->join('pedidos','clientes.id_cliente','=','pedidos.id_cliente','inner')
        ->where('pedidos.estado','=','FINALIZADO')
        ->get();
    	return view('admin.pedidos')->with('pedidos', $pedidos);
    }
    function generarPedido(){


        $datos= DB::table('productos')->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')
            ->join('categorias','categorias.categoria','=','disenos.categoria','inner')
            ->join('tipos_producto', 'tipos_producto.id_tipo_producto', '=','productos.id_tipo_producto', 'inner')
            ->join('carritos_has_productos', 'carritos_has_productos.id_producto','=','productos.id_producto', 'inner')
            ->join('carritos','carritos.id_carrito','=','carritos_has_productos.id_carrito', 'inner')
            ->select(DB::raw("carritos.sub_total as 'subtotal', carritos_has_productos.cantidad as 'cantidad', carritos_has_productos.total as 'total', carritos_has_productos.talla as 'talla', carritos.id_carrito as 'id_carrito', productos.sexo as 'sexo', productos.nombre as 'nombre', disenos.diseno as 'diseno', productos.costo_unitario as 'costo', tipos_producto.nombre as 'tipo', disenos.categoria as 'categoria', productos.id_producto as 'id_producto', carritos.id_carrito as 'id_carrito'"))
            ->where('carritos_has_productos.id_carrito','=',Session::get('id'))
            ->get();


        $pedido = new Pedido();
        $pedido->id_cliente = $datos[0]->id_carrito;
        $pedido->fecha_pedido = substr(Carbon::today(),0,10);
        $pedido->fecha_entrega = substr(Carbon::today()->addWeek(2),0,10);
        $pedido->detalles = 'Pedido realizado desde la web';
        $pedido->estado = 'PENDIENTE';

        $carrito= Carrito::find(Session::get('id'));
        foreach ($datos as $prod){
            $pedido->productos()->save($pedido, ['id_producto'=>$prod->id_producto,'total'=>$prod->total, 'cantidad'=>$prod->cantidad, 'talla'=>$prod->talla,]);
            $carrito->productos()->detach($prod->id_producto);
        }


        return redirect('/');
    }
}
