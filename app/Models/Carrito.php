<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table='carritos';
        protected $primarykey='id_carrito';
         public $timestamps=false;
    public function Producto_carrito(){
   	return $this->belongsToMany(Poducto::class, "carrito_has_productos", "carritos_id_carrito", "productos_id_producto");
   }
}
