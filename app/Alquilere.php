<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alquilere extends Model
{
	protected $table = 'alquileres';
    public function cliente(){
		return $this->belongsTo('App\Cliente');
	}//fin paciente

	public function trabajador(){
		return $this->belongsTo('App\Trabajadore');
	}//fin paciente

	public function maquinas(){
		return $this->belongsToMany('App\Maquina');
	}
}
