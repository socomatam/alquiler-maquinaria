<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'cli_nombre_empresa',
        'cli_nif',
        'cli_telefono', 
        'cli_email', 
        'cli_direccion',
        'cli_pais',
        'cli_ciudad',
        'cli_fecha_alta',
        'cli_nombre_contacto',
    ]; //fin fillable

    public function alquilere(){
        return $this->hasMany('App\Alquilere');
    }
}
