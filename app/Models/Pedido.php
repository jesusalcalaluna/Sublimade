<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
     protected $table='pedidos';
        protected $primaryKey='reg_pedido';
         public $timestamps=false;
}
