<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    public $timestamps = false;
    protected $primaryKey = 'categoria';

    function diseno(){
        return $this->belongsTo('App\Diseno','id_diseno','categoria');
    }
}
