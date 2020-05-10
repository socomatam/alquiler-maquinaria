<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    public function maquinas(){
        return $this->belongsTo('App\Maquina');
     }//fin maquinas
}
