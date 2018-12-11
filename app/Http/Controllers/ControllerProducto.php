<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//--------Modelos
use App\Models\Carrito;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Detalle_pedido;
use App\Models\Diseno;
use App\Models\Diseno_cliente;
use App\Models\Empleado;
use App\Models\Entrada;
use App\Models\Inventario;
use App\Models\Material;
use App\Models\Pedido;
use App\Models\Persona;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Proveedor_material;
use App\Models\Salida;
use App\Models\Tipos_producto;
use App\Models\User;
use App\Models\Usuario;
//------------------
//--------Librerias
use Illuminate\Support\Facades\DB;
//------------------

class ControllerProducto extends Controller
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
}
