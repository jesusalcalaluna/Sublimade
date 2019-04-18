<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Usuario extends Model
{
   protected $table = 'usuarios';
    protected $primaryKey='id_persona';
        public $timestamps=false;

          public function Carrito()
    {
    	
    	 	return $this->hasOne(Carrito::class ,'id_carrito','id_persona');
	    
    }
         public function Persona()
    {
    	
    	 	return $this->belongsTo(Persona::class ,'id_persona','id_persona');
	    
    }
        public function deseados()
    {
      
        return $this->belongsTo(Deseado::class ,'id_persona','id_deseados');
      
    }
}
