<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
     protected $primarykey='id_persona';
         public $timestamps=false;

          public function Carrito()
    {
    	
    	 	return $this->hasOne(Carrito::class ,'id_carrito','id_persona');
	    
    }
}
