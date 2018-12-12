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
