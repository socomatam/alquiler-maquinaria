<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model{
    
    public function maquina(){
        return $this->belongsTo('App\Maquina');
    }//fin maquina

    public function alquilere(){
        return $this->hasMany('App\Alquilere');
    }
}
