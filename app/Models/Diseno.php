<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diseno extends Model
{
    protected $table='disenos';
    protected $primaryKey='id_diseno';
    public $timestamps=false;
    
    function categorias(){
        $this->hasOne(Categoria::class,'categoria','id_diseno');
    }
    function productos(){
        $this->belongsTo(Producto::class, 'id_producto','id_diseno');
    }

    function diesnosclientes(){
        $this->belongsToMany(Clientes::class,'disenos_clientes','id_diseno','id_cliente');
    }
}
