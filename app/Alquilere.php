<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alquilere extends Model
{
    public function cliente(){
		return $this->belongsTo('App\Cliente');
	}//fin paciente
}
