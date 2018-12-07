<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectImage;
use Image;
use Input;
class SublimadeController extends Controller
{
    function base(){
        return view('base');
    }
    function index(){
        $project=ProjectImage::all();
//        dd($project);
        return view('index',compact('project'));
    }
    function subirarchivo(Request $request){
        $archivo=$request->file('archivo');
        $ruta=public_path().'/ime';
        $nombrearchivo=substr(uniqid(),1,5).$archivo[0]->getClientOriginalName();
        $image=Image::make($archivo[0])->greyscale();
        $image->save('ime/prueba.jpg');
        $archivo[0]->move($ruta,$nombrearchivo);
    }

    public function mostrarimage()
    {
        //$image = image::make(public_path('ime/c0692AutumnNeuschwanstein_ROW12334722987_1366x768.jpg'));
        //$image->resize(1000,200);
        //$image->save('ime/nueva.jpg');

        //$image->resize(1000,null,function($a){
        //    $a->aspectratio();
        //});
        $image=image::canvas(200,200,'#0000');
        $image->rectangle(10,45,100,2,function($a){
           $a->border(10,'#abff');
           $a->background('#ffff');
        });
        $image->line(10,145,100,145,function($a){
            $a->color('#abff');

        });


        return $image->response('jpg');
    }
public function mostrar($a,$b){
        $image=Image::make(public_path('ime/c0692AlpineLarches_ROW11646276761_1366x768.jpg'));

      // $image->greyscale();
    $image=Image::canvas(200,300,'#ffff');
    $image->resize($a,$b);
    $image->rectangle(100,100,300,200,function ($e){
       $e->border(2,'#0000');
       $e->background('#ffff00');
    });

    $image->save('ime/dibujo.jpg');

       return $image->response('jpg');


}














//    function upload(Request $request){
////        dd($request->file('file'));
//        $file=$request->file('file');
//        $path=public_path().'/images';
//        $fileName=uniqid().'.jpg';
//
//        $file->move($path,$fileName);
//
//        $projectImage=new ProjectImage();
//        $projectImage->nombre_archivo='images/'.$fileName;
//        $projectImage->save();
////        return back();
////        return Response::json('success', 200);
//    }
}
