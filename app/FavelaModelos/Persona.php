<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='personas';
    protected $primaryKey='id_persona';
    protected $timestamps= false;

    function cliente(){
        $this->belongsTo(Clientes::class,'id_cliente','id_persona');
    }
}
