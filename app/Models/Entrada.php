<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
     protected $table='entradas';
        protected $primarykey='id_entrada';
         public $timestamps=false;
}
