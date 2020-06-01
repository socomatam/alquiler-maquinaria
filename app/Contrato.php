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

    public function complementos(){
		return $this->belongsToMany('App\Complemento', 'complemento_contratos');
	}
}
