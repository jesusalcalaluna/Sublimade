<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipos_producto extends Model
{
     protected $table='Tipos_producto';
        protected $primarykey='id_tipo_producto';
         public $timestamps=false;
}