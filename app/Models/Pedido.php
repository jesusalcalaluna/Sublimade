<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
     protected $table='pedidos';
        protected $primaryKey='reg_pedido';
         public $timestamps=false;
         function productos(){
             return $this->belongsToMany(Producto::class, 'detalles_pedido', 'reg_pedido','id_producto');
         }
}
