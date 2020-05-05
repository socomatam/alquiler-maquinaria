<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajadore extends Model
{
    protected $table = 'trabajadores';

    public function alquilere(){
        return $this->hasMany('App\Alquilere');
    }//fin alquiler

    public function user(){
        return $this->hasOne('App\User');
    }//fin user

}//fin clease Trabajador
