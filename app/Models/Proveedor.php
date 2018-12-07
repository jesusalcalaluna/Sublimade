<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
     protected $table='proveedores';
        protected $primarykey='id_proveedor';
         public $timestamps=false;
}
