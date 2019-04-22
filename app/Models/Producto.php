<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
     protected $table='productos';
     protected $primaryKey='id_producto';
     public $timestamps=false;

     public function carritos(){
         return $this->belongsToMany(Carrito::class, "carrito_has_productos", "id_producto", "id_carrito");
     }

     public function deseados(){
        return $this->belongsTo(Deseado::class ,'id_producto','id_deseados');
     }
   
}
