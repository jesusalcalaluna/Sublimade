<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Persona extends Model
{
        protected $table='personas';
        protected $primarykey='id_persona';
         public $timestamps=false;

    public function Usuario(){
    	 
	    	return $this->hasOne(Usuario::class,'id_persona' ,'id_persona');
	    }
	      public function Empleado(){
    	 
	    	return $this->hasMany(Empleado::class,'id_persona' ,'id_persona');
	    }
	      public function Cliente(){
    	 
	    	return $this->hasMany(Cliente::class,'id_persona' ,'id_persona');
	    }
   
   
    
}
