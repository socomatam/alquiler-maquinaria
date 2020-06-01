<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complemento extends Model
{
    public function maquinas(){
		return $this->belongsToMany('App\Maquina','complemento_contratos');
	}
}
