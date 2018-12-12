<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_pedido extends Model
{
     protected $table='Detalles_pedido';
        protected $primaryKey='reg_pedido';
         public $timestamps=false;
}
