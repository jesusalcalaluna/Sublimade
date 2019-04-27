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
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
//------------------

class ControllerPedido extends Controller
{
    function getpedidopendiente(){

      $pedidos=DB::table('pedidos')->join('clientes','clientes.id_cliente','=','pedidos.id_cliente','inner')
            ->join('personas','personas.id_persona','=','clientes.id_persona','inner')
            ->select(DB::raw("pedidos.reg_pedido as 'reg_pedido',concat(personas.nombre,' ',personas.apellido) as 'id_cliente', pedidos.fecha_pedido as 'fecha_pedido', pedidos.fecha_entrega as 'fecha_entrega',pedidos.detalles as 'detalles', pedidos.estado as 'estado', pedidos.fecha_real_entrega as 'fecha_real_entrega'"))
            ->where('pedidos.estado','=','PENDIENTE')
            ->get();

    	//$pedidos= Pedido::where('estado','=','PENDIENTE')->get();
        $pedidos=DB::table('personas')
        ->join('clientes','personas.id_persona','=','clientes.id_persona','inner')
        ->join('pedidos','clientes.id_cliente','=','pedidos.id_cliente','inner')
        ->where('pedidos.estado','=','PENDIENTE')
        ->get();

    	return view('admin.pedidos')->with('pedidos', $pedidos);

    }

    function verpedidos(){
        $pedidos=DB::table('pedidos')->join('clientes','clientes.id_cliente','=','pedidos.id_cliente','inner')
            ->join('personas','personas.id_persona','=','clientes.id_persona','inner')
            ->select(DB::raw("pedidos.reg_pedido as 'reg_pedido',personas.nombre as 'id_cliente', pedidos.fecha_pedido as 'fecha_pedido', pedidos.fecha_entrega as 'fecha_entrega',pedidos.detalles as 'detalles', pedidos.estado as 'estado', pedidos.fecha_real_entrega as 'fecha_real_entrega'"))
            ->get();
        return $pedidos;
    }
    function getclientesfiltrados(Request $request){
        $nombrecliente=$request->get('nombre');
        $pedidos=DB::table('pedidos')->join('clientes','clientes.id_cliente','=','pedidos.id_cliente','inner')
            ->join('personas','personas.id_persona','=','clientes.id_persona','inner')
            ->select(DB::raw("pedidos.reg_pedido as 'reg_pedido',concat(personas.nombre,' ',personas.apellido) as 'id_cliente', pedidos.fecha_pedido as 'fecha_pedido', pedidos.fecha_entrega as 'fecha_entrega',pedidos.detalles as 'detalles', pedidos.estado as 'estado', pedidos.fecha_real_entrega as 'fecha_real_entrega'"))
            ->where('personas.nombre','=',$nombrecliente)
            ->get();
        return $pedidos;
    }


    function getreporteventas(){

        $ventas=DB::table('pedidos')->join('clientes','clientes.id_cliente','=','pedidos.id_cliente','inner')
            ->join('personas','personas.id_persona','=','clientes.id_persona','inner')
            ->join('reportes_ventas','reportes_ventas.pedidos_reg_pedido','=','pedidos.reg_pedido','inner')
            ->join('detalles_pedido','detalles_pedido.reg_pedido','=','pedidos.reg_pedido','inner')
            ->select(DB::raw("concat(personas.nombre,' ',personas.apellido) as 'Cliente', reportes_ventas.fecha as 'Fecha_de_venta', sum(total) as 'total_de_venta'"))
            ->groupBy('detalles_pedido.reg_pedido')
            ->get();
        return view('admin.reportes')->with('ventas',$ventas);
    }
function pdf(){
    $ventas = DB::table('pedidos')->join('clientes','clientes.id_cliente','=','pedidos.id_cliente','inner')
        ->join('personas','personas.id_persona','=','clientes.id_persona','inner')
        ->join('reportes_ventas','reportes_ventas.pedidos_reg_pedido','=','pedidos.reg_pedido','inner')
        ->join('detalles_pedido','detalles_pedido.reg_pedido','=','pedidos.reg_pedido','inner')
        ->select(DB::raw("concat(personas.nombre,' ',personas.apellido) as 'Cliente', reportes_ventas.fecha as 'Fecha_de_venta', sum(total) as 'total_de_venta'"))
        ->groupBy('detalles_pedido.reg_pedido')
        ->get();
    $pdf = new Dompdf();
    //$pdf = App::make('dompdf.wrapper');
    $view = view('admin.pdf', compact('ventas'));
    //$pdf->loadHtml('Hola mundo');
    $options = new Options();
    $options->set('defaultPaperSize','letter');
    $pdf->loadHtml($view);
    $pdf->setOptions($options);
    $pdf->render();
    return $pdf->stream('reportes.pdf');
}

function getgrafica(){

    $ventas=DB::table('pedidos')->join('clientes','clientes.id_cliente','=','pedidos.id_cliente','inner')
        ->join('personas','personas.id_persona','=','clientes.id_persona','inner')
        ->join('reportes_ventas','reportes_ventas.pedidos_reg_pedido','=','pedidos.reg_pedido','inner')
        ->join('detalles_pedido','detalles_pedido.reg_pedido','=','pedidos.reg_pedido','inner')
        ->select(DB::raw("concat(personas.nombre,' ',personas.apellido) as 'Cliente', reportes_ventas.fecha as 'Fecha_de_venta', sum(total) as 'total_de_venta'"))
        ->groupBy('detalles_pedido.reg_pedido')
        ->get();

    return $ventas;
}


    function getpedidoenproceso(){

//    	$pedidos= Pedido::where('estado','=','EN PROCESO')->get();

        $pedidos=DB::table('pedidos')->join('clientes','clientes.id_cliente','=','pedidos.id_cliente','inner')
            ->join('personas','personas.id_persona','=','clientes.id_persona','inner')
            ->select(DB::raw("pedidos.reg_pedido as 'reg_pedido',concat(personas.nombre,' ',personas.apellido) as 'id_cliente', pedidos.fecha_pedido as 'fecha_pedido', pedidos.fecha_entrega as 'fecha_entrega',pedidos.detalles as 'detalles', pedidos.estado as 'estado', pedidos.fecha_real_entrega as 'fecha_real_entrega'"))
            ->where('pedidos.estado','=','EN PROCESO')
            ->get();
        return view('admin.pedidos')->with('pedidos', $pedidos);
    }
    function getpedidofinalizado(){
        $pedidos=DB::table('pedidos')->join('clientes','clientes.id_cliente','=','pedidos.id_cliente','inner')
            ->join('personas','personas.id_persona','=','clientes.id_persona','inner')
            ->select(DB::raw("pedidos.reg_pedido as 'reg_pedido',concat(personas.nombre,' ',personas.apellido) as 'id_cliente', pedidos.fecha_pedido as 'fecha_pedido', pedidos.fecha_entrega as 'fecha_entrega',pedidos.detalles as 'detalles', pedidos.estado as 'estado', pedidos.fecha_real_entrega as 'fecha_real_entrega'"))
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
    function getPedidoUsuario(){
        $pedidos=DB::table('personas')
            ->join('clientes','personas.id_persona','=','clientes.id_persona','inner')
            ->join('pedidos','clientes.id_cliente','=','pedidos.id_cliente','inner')
            ->where('clientes.id_cliente','=', Session::get('id'))
            ->get();
        return view('verPedidosUser')->with('pedidos', $pedidos);
    }
    function generarPedidoAndroid(Request $r){
        $id = $r->get('id');

        $cliente = DB::table('clientes')->select('clientes.id_cliente')->where('id_persona', '=', $id)->get();
        $datos= DB::table('productos')->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')
            ->join('categorias','categorias.categoria','=','disenos.categoria','inner')
            ->join('tipos_producto', 'tipos_producto.id_tipo_producto', '=','productos.id_tipo_producto', 'inner')
            ->join('carritos_has_productos', 'carritos_has_productos.id_producto','=','productos.id_producto', 'inner')
            ->join('carritos','carritos.id_carrito','=','carritos_has_productos.id_carrito', 'inner')
            ->select(DB::raw("carritos.sub_total as 'subtotal', carritos_has_productos.cantidad as 'cantidad', carritos_has_productos.total as 'total', carritos_has_productos.talla as 'talla', carritos.id_carrito as 'id_carrito', productos.sexo as 'sexo', productos.nombre as 'nombre', disenos.diseno as 'diseno', productos.costo_unitario as 'costo', tipos_producto.nombre as 'tipo', disenos.categoria as 'categoria', productos.id_producto as 'id_producto', carritos.id_carrito as 'id_carrito'"))
            ->where('carritos_has_productos.id_carrito','=',$id)
            ->get();


        $pedido = new Pedido();
        $pedido->id_cliente = $cliente[0];
        $pedido->fecha_pedido = substr(Carbon::today(),0,10);
        $pedido->fecha_entrega = substr(Carbon::today()->addWeek(2),0,10);
        $pedido->detalles = 'Pedido realizado desde la aplicacion movil';

        $carrito= Carrito::find($id);
        foreach ($datos as $prod){
            $pedido->productos()->save($pedido, ['id_producto'=>$prod->id_producto,'total'=>$prod->total, 'cantidad'=>$prod->cantidad, 'talla'=>$prod->talla,]);
            $carrito->productos()->detach($prod->id_producto);
        }


    }
}
