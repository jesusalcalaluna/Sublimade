<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diseno extends Model
{
    protected $table = 'disenos';
    public $timestamps = false;
    protected $primaryKey = 'id_diseno';

    function producto(){
        return $this->belongsTo('App\Producto');
    }
    function categoria(){
        return $this->hasOne('App\Categoria', 'categoria');
    }
}
