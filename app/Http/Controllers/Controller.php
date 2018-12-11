<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Image;
use Input;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function subirarchivo(Request $request){
        $archivo=$request->file('archivo');
        $ruta=public_path().'/ime';
        $nombrearchivo=substr(uniqid(),1,5).$archivo[0]->getClientOriginalName();
        $image=Image::make($archivo[0])->greyscale();
        $image->save('ime/prueba.jpg');
        $archivo[0]->move($ruta,$nombrearchivo);
    }
}
