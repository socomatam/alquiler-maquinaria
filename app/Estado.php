<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public function maquinas(){
        return $this->belongsTo('App\Maquina');
     }//fin maquina
}
