<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desplazamiento extends Model
{
    public function maquinas(){
        return $this->belongsTo('App\Maquina');
     }//fin maquina
}
