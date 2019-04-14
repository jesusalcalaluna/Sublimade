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
use App\Deseado;

//------------------
//--------Librerias
use Illuminate\Support\Facades\DB;
//------------------

class ControllerProducto extends Controller
{

    function filtro(Request $r){
        $producto=$r->get('filtro');
        $producto = collect($producto);
        if($producto->get('tipo_prododucto')=='all' && $producto->get('categoria')=='all' && $producto->get('sexo')=='all'){
            $filtro = DB::table('productos')->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')
            ->join('categorias','categorias.categoria','=','disenos.categoria','inner')->join('tipos_producto', 'tipos_producto.id_tipo_producto', '=','productos.id_tipo_producto')->select(DB::raw("productos.sexo as 'sexo', productos.nombre as 'nombre', disenos.diseno as 'diseno', productos.costo_unitario as 'costo', tipos_producto.nombre as 'tipo', disenos.categoria as 'categoria', productos.id_producto as 'id_producto'"))->get();
                return $filtro;

        }elseif ($producto->get('tipo_prododucto')=='all' && $producto->get('categoria')=='all' && $producto->get('sexo')!='all') {
            $filtro = DB::table('productos')->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')
            ->join('categorias','categorias.categoria','=','disenos.categoria','inner')
            ->join('tipos_producto', 'tipos_producto.id_tipo_producto', '=','productos.id_tipo_producto')
            ->select(DB::raw("productos.sexo as 'sexo', productos.nombre as 'nombre', disenos.diseno as 'diseno', productos.costo_unitario as 'costo', tipos_producto.nombre as 'tipo', disenos.categoria as 'categoria', productos.id_producto as 'id_producto'"))
            ->where('productos.sexo','=',$producto->get('sexo'))
            ->get();
                return $filtro;

        }elseif ($producto->get('tipo_prododucto')=='all' && $producto->get('categoria')!='all' && $producto->get('sexo')=='all') {
            $filtro = DB::table('productos')
            ->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')
            ->join('categorias','categorias.categoria','=','disenos.categoria','inner')
            ->join('tipos_producto', 'tipos_producto.id_tipo_producto', '=','productos.id_tipo_producto')
            ->select(DB::raw("productos.sexo as 'sexo', productos.nombre as 'nombre', disenos.diseno as 'diseno', productos.costo_unitario as 'costo', tipos_producto.nombre as 'tipo', disenos.categoria as 'categoria', productos.id_producto as 'id_producto'"))
            ->where('disenos.categoria','=',$producto->get('categoria'))->get();
                return $filtro;

        }elseif ($producto->get('tipo_prododucto')!='all' && $producto->get('categoria')=='all' && $producto->get('sexo')=='all') {
            $filtro = DB::table('productos')->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')
            ->join('categorias','categorias.categoria','=','disenos.categoria','inner')
            ->join('tipos_producto', 'tipos_producto.id_tipo_producto', '=','productos.id_tipo_producto')
            ->select(DB::raw("productos.sexo as 'sexo', productos.nombre as 'nombre', disenos.diseno as 'diseno', productos.costo_unitario as 'costo', tipos_producto.nombre as 'tipo', disenos.categoria as 'categoria', productos.id_producto as 'id_producto'"))
            ->where('productos.id_tipo_producto','=',$producto->get('tipo_prododucto'))
            ->get();
                return $filtro;

        }elseif ($producto->get('tipo_prododucto')!='all' && $producto->get('categoria')=='all' && $producto->get('sexo')!='all') {
            $filtro = DB::table('productos')->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')
            ->join('categorias','categorias.categoria','=','disenos.categoria','inner')
            ->join('tipos_producto', 'tipos_producto.id_tipo_producto', '=','productos.id_tipo_producto')
            ->select(DB::raw("productos.sexo as 'sexo', productos.nombre as 'nombre', disenos.diseno as 'diseno', productos.costo_unitario as 'costo', tipos_producto.nombre as 'tipo', disenos.categoria as 'categoria', productos.id_producto as 'id_producto'"))
            ->where('productos.id_tipo_producto','=',$producto->get('tipo_prododucto'))
            ->where('productos.sexo','=',$producto->get('sexo'))
            ->get();
                return $filtro;

        }elseif ($producto->get('tipo_prododucto')=='all' && $producto->get('categoria')!='all' && $producto->get('sexo')!='all') {
            $filtro = DB::table('productos')
            ->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')
            ->join('categorias','categorias.categoria','=','disenos.categoria','inner')
            ->join('tipos_producto', 'tipos_producto.id_tipo_producto', '=','productos.id_tipo_producto')
            ->select(DB::raw("productos.sexo as 'sexo', productos.nombre as 'nombre', disenos.diseno as 'diseno', productos.costo_unitario as 'costo', tipos_producto.nombre as 'tipo', disenos.categoria as 'categoria', productos.id_producto as 'id_producto'"))
            ->where('productos.sexo','=',$producto->get('sexo'))
            ->where('disenos.categoria','=',$producto->get('categoria'))->get();
                return $filtro;

        }elseif ($producto->get('tipo_prododucto')!='all' && $producto->get('categoria')!='all' && $producto->get('sexo')=='all') {
            $filtro = DB::table('productos')->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')
            ->join('categorias','categorias.categoria','=','disenos.categoria','inner')
            ->join('tipos_producto', 'tipos_producto.id_tipo_producto', '=','productos.id_tipo_producto')
            ->select(DB::raw("productos.sexo as 'sexo', productos.nombre as 'nombre', disenos.diseno as 'diseno', productos.costo_unitario as 'costo', tipos_producto.nombre as 'tipo', disenos.categoria as 'categoria', productos.id_producto as 'id_producto'"))
            ->where('disenos.categoria','=',$producto->get('categoria'))
            ->where('productos.id_tipo_producto','=',$producto->get('tipo_prododucto'))
            ->get();
                return $filtro;

        }else{
            $filtro = DB::table('productos')->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')
            ->join('categorias','categorias.categoria','=','disenos.categoria','inner')->join('tipos_producto', 'tipos_producto.id_tipo_producto', '=','productos.id_tipo_producto')->select(DB::raw("productos.sexo as 'sexo', productos.nombre as 'nombre', disenos.diseno as 'diseno', productos.costo_unitario as 'costo', tipos_producto.nombre as 'tipo', disenos.categoria as 'categoria', productos.id_producto as 'id_producto'"))->where('productos.sexo','=',$producto->get('sexo'))->where('productos.id_tipo_producto','=',$producto->get('tipo_prododucto'))
                ->where('disenos.categoria','=',$producto->get('categoria'))->get();
                return $filtro;
        }
        

    }

    function viewProducto(){
      
        $productos = DB::table('productos')->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')->get();
        $tipos_productos = Tipos_producto::all();
        $categorias = Categoria::all();
        
        return view('catalogo')->with('productos', $productos)->with('tipos_productos', $tipos_productos)->with('categorias', $categorias);
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

    //Android
    function androidCatalogo(){
        $productos = DB::table('productos')
            ->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')
            ->join('categorias','categorias.categoria','=','disenos.categoria','inner')
            ->select(DB::raw("productos.nombre, productos.costo_unitario, disenos.diseno, categorias.categoria, productos.id_producto"))
            ->get();
        return $productos;
    }
    function androidDetalles(Request $r){
        $id = $r->get(1);
        $productos = DB::table('productos')
            ->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')
            ->where("productos.id_producto", '=', $id)
            ->get();

        return $productos;
    }

    function androidcategorias(){
        $categorias=DB::table('categorias')->get();
        return $categorias;
    }
     public function obtenerproducto(Request $r){
        
        $deseado= new deseado;
        $deseado->productos_id_producto= $r->get('productos_id_producto');
        $deseado->usuarios_id_persona=$r->get('usuarios_id_persona');
        $deseado->save();
    
    $id_producto = $r->get("productos_id_producto");

    $u=Deseado::where("productos_id_producto","=",$id_producto)->first();
    return $u;
    }
     function androidDeseados(Request $r){

         $id=$r->get(1);
         $productos = DB::table('productos')
            ->join('deseados','deseados.productos_id_producto','=','productos.id_producto','inner')
            ->join('usuarios','usuarios.id_persona','=','deseados.usuarios_id_persona','inner')
            ->join('disenos','disenos.id_diseno','=','productos.id_diseno','inner')
            ->join('categorias','categorias.categoria','=','disenos.categoria','inner')->where("deseados.usuarios_id_persona", '=', $id)
            ->select(DB::raw("productos.nombre, productos.costo_unitario, disenos.diseno, categorias.categoria, productos.id_producto"))
            ->get();

        return $productos;
    }

     function borrardeseado(Request $r){

        $id_producto = $r->get("id");
          $id = DB::table('deseados')->where('deseados.productos_id_producto','=',$id_producto)
         ->select('deseados.id_deseados')
         ->get();
     $d= $d= Deseado::find($id);

//      $d= Deseado::find($id);
   //   $d->delete();
    return $id->id_deseados;

    }

}
