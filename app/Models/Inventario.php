<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
     protected $table='inventario';
        protected $primarykey='id_material';
         public $timestamps=false;
}
