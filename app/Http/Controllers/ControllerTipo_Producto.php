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

class ControllerTipo_Producto extends Controller
{
    function GetTipos_producto(){
    	$tipos_producto=Tipos_producto::all();
    	return $tipos_producto;
    }
}