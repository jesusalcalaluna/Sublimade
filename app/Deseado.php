<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deseado extends Model
{
     protected $table='deseados';
        protected $primarykey='id_deseados';
         public $timestamps=false;


          public function usuarios()
    {
    	
    	 	return $this->belongsTo(Persona::class ,'id_deseados','id_persona');
	    
    }
      public function producto()
    {
      
        return $this->belongsTo(Producto::class ,'id_deseados','id_producto');
      
    }
}
