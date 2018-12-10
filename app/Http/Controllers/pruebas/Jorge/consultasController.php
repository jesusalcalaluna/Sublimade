<?php

namespace App\Http\Controllers;

use App\Carrito;

use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class consultasController extends Controller
{
    function viewProducto(){
        $productos = DB::table('productos')->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')->get();
        return view('catalogo')->with('productos', $productos);
    }
    function detalles(Request $r){
        $id = $r->input('id');
        $producto = DB::table('productos')->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')
            ->join('categorias','categorias.categoria','=','disenos.categoria','inner')->join('tipos_producto', 'tipos_producto.id_tipo_producto', '=','productos.id_tipo_producto')
            ->select(DB::raw("productos.sexo as 'sexo', productos.nombre as 'nombre', disenos.diseno as 'diseno', productos.costo_unitario as 'costo', tipos_producto.nombre as 'tipo', disenos.categoria as 'categoria', productos.id_producto as 'id_producto'"))
            ->where('productos.id_producto','=',$id)
            ->get();
        return view('jorgeViews.detallesProducto')->with('producto',$producto); 
    }
    function carrito(Request $r){
        $id = $r->input('id');
        $talla = $r->get('tallas');
        $cantidad = $r->input('cantidad');
        $costo_unitario = DB::table('productos')->select('productos.costo_unitario')->where('productos.id_producto','=',$id)->get();
        $total = $cantidad*$costo_unitario[0]->costo_unitario;

        //$carrito = DB::table('carritos')->select()->where('id_carrito','=',4)->get();
        //$carrito->producto_carrito()->id_carrito = ;


        $carrito_pivot = Carrito::find(4)->first();

        $carrito_pivot->sub_total = 0;
        $carrito_pivot->productos()->save($carrito_pivot, ['id_carrito' =>4,'id_producto'=>$id, 'cantidad'=>$cantidad, 'total'=>$total,'talla'=>$talla]);


        //$subtotal = DB::table('carritos_has_productos')->select(DB::raw("sum(carritos_has_productos.total) as 'subtotal'"))->where('carritos_has_productos.id_carrito','=',4)->get();


        //$carrito = App\Carrito::where('id_carrito',4);

        //$carrito->save();
        $producto = DB::table('productos')->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')
            ->join('categorias','categorias.categoria','=','disenos.categoria','inner')
            ->join('tipos_producto', 'tipos_producto.id_tipo_producto', '=','productos.id_tipo_producto', 'inner')
            ->join('carritos_has_productos', 'carritos_has_productos.id_producto','=','productos.id_producto', 'inner')
            ->join('carritos','carritos.id_carrito','=','carritos_has_productos.id_carrito', 'inner')
            ->select(DB::raw("carritos.sub_total as 'subtotal', carritos_has_productos.cantidad as 'cantidad', carritos_has_productos.total as 'total', carritos_has_productos.talla as 'talla', carritos.id_carrito as 'id_carrito', productos.sexo as 'sexo', productos.nombre as 'nombre', disenos.diseno as 'diseno', productos.costo_unitario as 'costo', tipos_producto.nombre as 'tipo', disenos.categoria as 'categoria', productos.id_producto as 'id_producto'"))
            ->where('carritos_has_productos.id_carrito','=',4)
            ->get();

        return view('jorgeViews.carrito')->with('producto', $producto)->with('cantidad', $cantidad)->with('talla', $talla);
    }
    function generar_subtotal(){

    }


}
