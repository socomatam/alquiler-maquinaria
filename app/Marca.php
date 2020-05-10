<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    public function maquinas(){
        return $this->belongsTo('App\Maquina');
    }//fin maquinas
}
