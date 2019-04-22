<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table='carritos';
    protected $primaryKey='id_carrito';
    public $timestamps=false;

    public function productos(){
   	return $this->belongsToMany(Producto::class, "carritos_has_productos", "id_carrito", "id_producto");
   }
}
