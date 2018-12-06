<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavelaController extends Controller
{
    function registrardisenos(){
        return view('FavelaViews.diseno');
    }
    function ingresardiseno(Request $request){
        $archivo=$request->file('file');
        $ruta=storage_path().'/disenos/disenos_clientes';
        $nombrearchivo=substr(uniqid(),1,5).$archivo->getClientOriginalName();

        $archivo->move($ruta,$nombrearchivo);
        dd($request->input('algo'));
    }
}
//identificar qué tipo de usuario es y guardar el diseño en distintas carpetas