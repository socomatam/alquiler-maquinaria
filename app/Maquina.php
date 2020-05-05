<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    public function alquileres(){
		return $this->belongsToMany('App\Alquilere');
	}

	public function contrato(){
		return $this->hasOne('App\Contrato');
	}//fin contrato

}
