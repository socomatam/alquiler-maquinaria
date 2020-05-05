<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alquilere extends Model
{
	//protected $table = 'alquileres';
	protected $fillable = [
		'cliente_id',
		'alq_fecha_inicio',
		'alq_fecha_fin',
		'alq_precio',
		'alq_detalle_trabajo',
		'alq_incidencia',
		'trabajador_id',

    ]; //fin fillable

	
    public function cliente(){
		return $this->belongsTo('App\Cliente');
	}//fin paciente

	public function contrato(){
		return $this->belongsTo('App\Contrato');
	}//fin paciente

	public function trabajador(){
		return $this->belongsTo('App\Trabajadore');
	}//fin paciente

	public function maquinas(){
		return $this->belongsToMany('App\Maquina');
	}

	//Accesor que convierte un dato tipo fecha 
	//public function setAlqFechaInicioAttribute($value){
       // $this->attributes['alq_fecha_inicio'] =  $value = date("Y-m-d");
	//}
	
	//public function setAlqFechaFinAttribute($value){
      //  $this->attributes['alq_fecha_fin'] =  $value = date("Y-m-d");
    //}


}
