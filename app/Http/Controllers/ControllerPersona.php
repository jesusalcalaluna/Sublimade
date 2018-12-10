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


class ControllerPersona extends Controller
{
    function registrarpersona(request $request){
    	$persona = new Persona();
    	$persona->nombre = $request->nombre;
    	$persona->apellido = $request->apellido;
    	$persona->tel_casa = $request->tel_casa;
    	$persona->tel_celular = $request->tel_celular;
    	$persona->direccion = $request->direccion;
    	$persona->cp = $request->cp;
    	$persona->f_nacimiento = $request->f_nacimiento;
    	$persona->sexo = $request->sexo;
    	save($persona);

    	

    }
}
