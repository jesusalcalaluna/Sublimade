<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
     protected $table='empleados';
        protected $primarykey='id_empleado';
         public $timestamps=false;
}
