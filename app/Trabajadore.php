<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajadore extends Model
{
    protected $table = 'trabajadores';

    protected $fillable = [
        'tra_nombre_trabajador',
        'tra_apellido_1',
        'tra_apellido_2',
        'tra_telefono', 
        'tra_email', 
        'tra_fecha_nacimiento',
        'tra_dni',
        'tra_fecha_alta',
    ]; //fin fillable

    public function alquilere(){
        return $this->hasMany('App\Alquilere');
    }//fin alquiler

    public function user(){
        return $this->hasOne('App\User');
    }//fin user

}//fin clease Trabajador
