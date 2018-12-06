<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';
        protected $primarykey='id_cliente';
         public $timestamps=false;

            public function Pedido(){
    	 
	    	return $this->hasMany(Pedido::class,'id_cliente' ,'id_cliente');
	    	//primero va la foranea despues la primaria de donde te encuentras
	    }
}
