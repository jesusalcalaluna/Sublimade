<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
     protected $table='categorias';
     protected $fillable = ['categoria'];
     public $timestamps=false;

     function diseno(){
        return $this->belongsTo('App\Models\Diseno','id_diseno','categoria');
    }
}
