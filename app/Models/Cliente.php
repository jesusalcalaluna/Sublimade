<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';
        protected $primaryKey='id_cliente';
         public $timestamps=false;

    public function Pedido(){
  
		return $this->hasMany(Pedido::class,'id_cliente' ,'id_cliente');
		//primero va la foranea despues la primaria de donde te encuentras
	}
	function disenos(){

        $this->belongsToMany(Diseno::class,'disenos_clientes','id_cliente','id_diseno');
    }

    function persona(){
        $this->hasOne(Persona::class,'id_persona','id_cliente');
    }
}
