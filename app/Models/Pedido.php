<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
     protected $table='pedidos';
        protected $primarykey='reg_pedido';
         public $timestamps=false;
}
