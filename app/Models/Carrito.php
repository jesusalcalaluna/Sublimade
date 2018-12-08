<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table='carritos';
        protected $primarykey='id_carrito';
         public $timestamps=false;
    public function producto_carrito(){
   	return $this->belongsToMany('App\Producto', "carritos_has_productos", "id_carrito", "id_producto");
   }
}
