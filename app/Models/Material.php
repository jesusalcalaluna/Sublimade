<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
     protected $table='Materiales';
        protected $primarykey='id_material';
         public $timestamps=false;
}
