<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipos_producto extends Model
{
        protected $table='tipos_producto';
        protected $primaryKey='id_tipo_producto';
        public $timestamps=false;

    function producto(){
        return $this->belongsTo('App\Producto');
    }
}
