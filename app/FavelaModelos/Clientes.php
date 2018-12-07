<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table="clientes";
    protected $primaryKey="id_cliente";
    protected $timestamps=false;

    function disenos(){

        $this->belongsToMany(Diseno::class,'disenos_clientes','id_cliente','id_diseno');
    }

    function persona(){
        $this->hasOne(Persona::class,'id_persona','id_cliente');
    }
}
