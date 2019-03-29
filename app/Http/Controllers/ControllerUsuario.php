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
use Hash;
use DB;
use Session;
Use Redirect;
use Alert;
use Illuminate\Support\Str;


//------------------

class ControllerUsuario extends Controller
{

    public function iniciarsession(Request $r){
    $users = DB::table('usuarios')->where('usuarios.e_mail','=',$r->usuario)
    ->select('usuarios.tipo_usuario')
    ->first();
    $password = DB::table('usuarios')->where('usuarios.pass','=',$r->contrasena)->where('usuarios.e_mail','=',$r->usuario)
    ->first();



  if($password!=null)
    {
      Session::put('nombre' ,$password->e_mail);

        Session::put('id',$password->id_persona);
        Session::get('id');
      if($users->tipo_usuario=='1')
      {

       Session::put('tipo' ,'1');
       Alert::error('Binevenido '.$password->e_mail);
      //dd( Session::get('admin') );
       return redirect('/');
      }
      if($users->tipo_usuario=='0')
      {
      Session::put('tipo' ,'0');
      Alert::error('Binevenido '.$password->e_mail);
      return redirect('/');

      }
        if($users->tipo_usuario=='2')
      {
      Session::put('tipo' ,'2');
      Alert::error('Binevenido '.$password->e_mail);
      return redirect('/');

      }
      }else{

        Alert::error('Usuario o contraseña incorrecta');
       return back();
      }

    }

     public function register(Request $r){

       $usua = DB::table('usuarios')->where('usuarios.e_mail','=',$r->input("email"))
      ->first();
        $id = DB::table('personas')->where('personas.tel_celular','=',$r->input("celular"))
         ->first();


       if($usua==null){

        $persona= new Persona;
        //  $persona->id_persona= $request->input("id_usuario");
         $persona->nombre= $r->input("nombre");
         $persona->apellido=$r->input("apellido");
         $persona->direccion=$r->input("direccion");
         $persona->tel_casa=$r->input("telefono");
         $persona->tel_celular=$r->input("celular");
         $persona->cp=$r->input("cp");
         $persona->f_nacimiento=$r->input("nacimiento");
         $persona->sexo=$r->input("sexo");
         $resul= $persona->save();

         $id = DB::table('personas')->where('personas.tel_celular','=',$r->input("celular"))
         ->select('personas.id_persona')
         ->first();

         //Session::put('id',$id->id_persona);

         $Usuario= new Usuario;
         $Usuario->id_persona= $id->id_persona;
         $Usuario->e_mail=$r->input("email");
         $Usuario->tipo_usuario="0";
         $Usuario->pass=Hash::make($r->input("contrasena"));
         $usuario->api_token= Str::random(60);
         $resul= $Usuario->save();

         $cliente= new Cliente;
         $cliente->id_persona= $id->id_persona;
         $cliente->save();
         $carrito= new Carrito;
         $carrito->id_carrito= $id->id_persona;
         $carrito->sub_total='0';
         $carrito->save();


         Alert::error('Usuario Registrado ');
         return redirect('/inicio.sesion');

       }
       else{
         Alert::error('Este Correo Ya Existe');
         return back();
        }
    }

    public function cerrar(){
        Session::flush();
        return redirect('/');
	}

  public function registraradmins(){
    $Usuarios= DB::table('usuarios')->where('usuarios.tipo_usuario', '=', '0')->get();
    return view('admin.registraradministradores')->with('usuarios',$Usuarios);

  }
   public function getadmins(){
    $Usuarios= Usuario::all();
       return $Usuarios;

  }
  public function filtrogetadmins(Request $r){
    $nombre=$r->get('nombre');
   $Usuarios= Usuario::all()->where("usuarios.e_mail","=",$nombre);
    return $Usuarios;

  }

  public function cambioprivilegio(Request $r){

  $usua = DB::table('usuarios')->where('usuarios.e_mail','=',$r->input("nombre"))
      ->first();
     $A= $usua->id_persona;

     $P= Usuario::find($A);
     $P->tipo_usuario='2';
     $P->save();
     Alert::error('Privilegio de Administrador Otorgado A '.$usua->e_mail);
     return back();
  }

	function modificarInfoView(){
        $usuario = Persona::find(Session::get('id'));

        return view('modDatosUsuario')->with('usuario',$usuario);
    }
    function actualizarInfo(Request $request){
        $usuario=Persona::find(Session::get('id'));

        $tel_casa =  $request->input('telefono-casa');
        $tel_cel = $request->input('telefono-cel');
        $direccion = $request->direccion;
        $cp =  $request->cp;

        if($tel_casa!=null){
            $usuario->nombre = $tel_casa;
        }
        if($tel_cel!=null){
            $usuario->tel_celular = $tel_cel;
        }
        if($direccion!=null){
            $usuario->direccion = $direccion;
        }
        if($cp!=null){
            $usuario->cp = $cp;
        }
        $usuario->save();
        return back();

    }

    public function registerandroid(Request $r){

        $persona= new Persona;
        $persona->nombre= $r->get('nombre');
        $persona->apellido=$r->get('apellido');
        $persona->direccion=$r->get('direccion');
        $persona->tel_casa=$r->get('telefono');
        $persona->tel_celular=$r->get('celular');
        $persona->cp = $r->get('cp');
        $persona->f_nacimiento=$r->get('nacimiento');
        $persona->sexo=$r->get('sexo');
        $persona->save();


          $id = DB::table('personas')->where('personas.tel_celular','=',$r->get('celular'))
         ->select('personas.id_persona')
         ->first();



         //Session::put('id',$id->id_persona);

         $Usuario= new Usuario;
         $Usuario->id_persona= $id->id_persona;
         $Usuario->pass= $r->get('contrasena');
        $Usuario->e_mail=$r->get('email');
         $Usuario->tipo_usuario='0';
         $resul= $Usuario->save();

         $cliente= new Cliente;
         $cliente->id_persona= $id->id_persona;
         $cliente->save();
         $carrito= new Carrito;
         $carrito->id_carrito= $id->id_persona;
         $carrito->sub_total='0';
         $carrito->save();

     return $persona;
}
 public function registerandroidv(Request $r){


   }



}
