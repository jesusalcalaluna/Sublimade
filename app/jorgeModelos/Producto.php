<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    public $primaryKey = 'id_producto';
    public $timestamps = false;

    function diseno(){
        return $this->hasOne('App\Diseno', 'id_diseno');
    }
    function tipo_producto(){
        return $this->hasOne('App\Tipo_producto', 'id_tipo_producto');
    }
}
