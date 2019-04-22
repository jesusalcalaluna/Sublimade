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
use Illuminate\Support\Facades\DB;
use Session;


//------------------

class ControllerCarro extends Controller
{
    function carritoView(Request $r){
        $id = $r->input('id');
        $talla = $r->get('tallas');
        $cantidad = $r->input('cantidad');
        $costo_unitario = DB::table('productos')->select('productos.costo_unitario')->where('productos.id_producto','=',$id)->get();
        $total = $cantidad*$costo_unitario[0]->costo_unitario;



        $carrito_pivot = Carrito::find(Session::get('id'));
        $carrito_pivot->sub_total += $total;
        $carrito_pivot->productos()->save($carrito_pivot, ['id_carrito' =>Session::get('id'),'id_producto'=>$id, 'cantidad'=>$cantidad, 'total'=>$total,'talla'=>$talla]);


        $producto = DB::table('productos')->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')
            ->join('categorias','categorias.categoria','=','disenos.categoria','inner')
            ->join('tipos_producto', 'tipos_producto.id_tipo_producto', '=','productos.id_tipo_producto', 'inner')
            ->join('carritos_has_productos', 'carritos_has_productos.id_producto','=','productos.id_producto', 'inner')
            ->join('carritos','carritos.id_carrito','=','carritos_has_productos.id_carrito', 'inner')
            ->select(DB::raw("carritos.sub_total as 'subtotal', carritos_has_productos.cantidad as 'cantidad', carritos_has_productos.total as 'total', carritos_has_productos.talla as 'talla', carritos.id_carrito as 'id_carrito', productos.sexo as 'sexo', productos.nombre as 'nombre', disenos.diseno as 'diseno', productos.costo_unitario as 'costo', tipos_producto.nombre as 'tipo', disenos.categoria as 'categoria', productos.id_producto as 'id_producto', carritos.id_carrito as 'id_carrito'"))
            ->where('carritos_has_productos.id_carrito','=',Session::get('id'))
            ->get();

        return view('jorgeViews.carrito')->with('producto', $producto)->with('cantidad', $cantidad)->with('talla', $talla);
    }

    function carritoVacio(){
        $producto = DB::table('productos')->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')
            ->join('categorias','categorias.categoria','=','disenos.categoria','inner')
            ->join('tipos_producto', 'tipos_producto.id_tipo_producto', '=','productos.id_tipo_producto', 'inner')
            ->join('carritos_has_productos', 'carritos_has_productos.id_producto','=','productos.id_producto', 'inner')
            ->join('carritos','carritos.id_carrito','=','carritos_has_productos.id_carrito', 'inner')
            ->select(DB::raw("carritos.sub_total as 'subtotal', carritos_has_productos.cantidad as 'cantidad', carritos_has_productos.total as 'total', carritos_has_productos.talla as 'talla', carritos.id_carrito as 'id_carrito', productos.sexo as 'sexo', productos.nombre as 'nombre', disenos.diseno as 'diseno', productos.costo_unitario as 'costo', tipos_producto.nombre as 'tipo', disenos.categoria as 'categoria', productos.id_producto as 'id_producto', carritos.id_carrito as 'id_carrito'"))
            ->where('carritos_has_productos.id_carrito','=',Session::get('id'))
            ->get();
        return view('jorgeViews.carrito')->with('producto', $producto);
    }
    function eliminarProducto(Request $r){
        $id_carr= $r->input('id_carr');
        $id_prod=$r->input('id_prod');

        $carrito = Carrito::find($id_carr);
        $carrito->productos()->detach($id_prod);


        return back();

    }
    function finalizarcompra(Request $r){
        $subtotal = $r->input('subtotal');
        $cliente = $r->input('id_client');

        return view('jorgeViews.pago')->with('subtotal',$subtotal)->with('cliente',$cliente);
    }
    function addtocartandroid(Request $r){

        $id = $r->get('id');
        $id_usuario = $r->get('id_usuario');
        $talla = $r->get('talla');
        $cantidad = $r->get('cantidad');
        $costo_unitario = DB::table('productos')->select('productos.costo_unitario')->where('productos.id_producto','=',$id)->get();
        $total = $cantidad*$costo_unitario[0]->costo_unitario;


        $carrito_pivot = Carrito::find($id_usuario);
        $carrito_pivot->sub_total += $total;
        $carrito_pivot->productos()->save($carrito_pivot, ['id_carrito' =>$id_usuario,'id_producto'=>$id, 'cantidad'=>$cantidad, 'total'=>$total,'talla'=>$talla]);

    }
    function vercarritoandroid(Request $r){
        $id = $r->get(1);

        $producto = DB::table('productos')->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')
            ->join('categorias','categorias.categoria','=','disenos.categoria','inner')
            ->join('tipos_producto', 'tipos_producto.id_tipo_producto', '=','productos.id_tipo_producto', 'inner')
            ->join('carritos_has_productos', 'carritos_has_productos.id_producto','=','productos.id_producto', 'inner')
            ->join('carritos','carritos.id_carrito','=','carritos_has_productos.id_carrito', 'inner')
            ->select(DB::raw("carritos_has_productos.reg as  'reg', carritos.sub_total as 'sub_total', carritos_has_productos.cantidad as 'cantidad', carritos_has_productos.total as 'total', carritos_has_productos.talla as 'talla', carritos.id_carrito as 'id_carrito', productos.sexo as 'sexo', productos.nombre as 'nombre', disenos.diseno as 'diseno', productos.costo_unitario as 'costo_unitario', tipos_producto.nombre as 'tipo', disenos.categoria as 'categoria', productos.id_producto as 'id_producto'"))
            ->where('carritos_has_productos.id_carrito','=',$id)
            ->get();

        return $producto;

    }
    function deleteprodandroid(Request $r){


        $id_carrito=$r->get('id_carrito');
        $id_prod =$r->get('$id_prod');

        $carrito = Carrito::find($id_carrito);
        $carrito->productos()->detach($id_prod);

    }

}
