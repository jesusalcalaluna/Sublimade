<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use Image;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function slider1(Request $request){
        $archivo=$request->file('archivo');
        $ruta=public_path().'/storage/Inicio/';
        $archivo->move($ruta,'slider1.png');
    }
    function slider2(Request $request){
        $archivo=$request->file('archivo');
        $ruta=public_path().'/storage/Inicio/';
        $archivo->move($ruta,'slider2.png');
    }
    function slider3(Request $request){
        $archivo=$request->file('archivo');
        $ruta=public_path().'/storage/Inicio/';
        $archivo->move($ruta,'slider3.png');
    }
    function slider4(Request $request){
        $archivo=$request->file('archivo');
        $ruta=public_path().'/storage/Inicio/';
        $archivo->move($ruta,'slider4.png');
    }

    function destacado1(Request $request){
        $archivo=$request->file('archivo');
        $ruta=public_path().'/storage/Inicio/';
        $archivo->move($ruta,'destacado1.png');
    }
    function destacado2(Request $request){
        $archivo=$request->file('archivo');
        $ruta=public_path().'/storage/Inicio/';
        $archivo->move($ruta,'destacado2.png');
    }
    function destacado3(Request $request){
        $archivo=$request->file('archivo');
        $ruta=public_path().'/storage/Inicio/';
        $archivo->move($ruta,'destacado3.png');
    }
    function destacado4(Request $request){
        $archivo=$request->file('archivo');
        $ruta=public_path().'/storage/Inicio/';
        $archivo->move($ruta,'destacado4.png');
    }

}
