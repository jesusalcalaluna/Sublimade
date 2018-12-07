<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
     protected $table='productos';
        protected $primarykey='id_producto';
         public $timestamps=false;

          public function Carrito_producto(){
   	return $this->belongsToMany(Poducto::class, "carrito_has_productos", "productos_id_producto", "carritos_id_carrito");
   }
}
