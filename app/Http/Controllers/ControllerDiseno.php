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

class ControllerDiseno extends Controller
{
 function  getdisenos(){
     $disenos=Diseno::all();
//     dd($disenos);
     return view('admin.verdisenos',compact('disenos'));
 }
 function getnombresdisenos(){
     $disenos=Diseno::all();
     return $disenos;
 }

 function getdisenosfiltrados(Request $request){
     $nombre=$request->get('nombre');

//     dd($nombre);
     $disenos=Diseno::all()->where('nombre','=',$nombre);
//     dd($disenos);
     return $disenos;
 }

}
