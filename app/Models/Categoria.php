<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
     protected $table='categorias';
        protected $primaryKey='categoria';
         public $timestamps=false;
}
