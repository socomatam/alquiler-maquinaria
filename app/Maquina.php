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

	public function complementos(){
		return $this->belongsToMany('App\Complemento');
	}

	public function categorias(){
		return $this->hasMany('App\Categoria');
	}//fin contrato

	public function tipos(){
		return $this->hasMany('App\Tipos');
	}//fin contrato

	public function marcas(){
		return $this->hasMany('App\Marca');
	}//fin contrato

	public function desplazamientos(){
		return $this->hasMany('App\Desplazamiento');
	}//fin contrato


}
