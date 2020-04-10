<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    public function alquilere(){
        return $this->hasMany('App\Alquilere');
    }
}
