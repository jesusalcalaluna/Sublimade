<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_producto extends Model
{
    protected $table = 'tipos_producto';
    public $timestamps = false;
    protected $primaryKey = 'id_tipo_producto';

    function producto(){
        return $this->belongsTo('App\Producto');
    }
}
