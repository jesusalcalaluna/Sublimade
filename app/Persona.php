<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
        protected $table = 'personas';
     protected $primaryKey='id_persona';
         public $timestamps=false;

            public function Usuario()
    {
    	
    	 	return $this->hasOne(Usuario::class ,'id_carrito','id_persona');
	    
    }
}
