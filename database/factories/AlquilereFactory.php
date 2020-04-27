<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Alquilere;
use Faker\Generator as Faker;

$factory->define(Alquilere::class, function (Faker $faker) {
    return [
        'alq_fecha_inicio'=>$faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
        'alq_fecha_fin'=>$faker->dateTimeBetween($startDate = '-2 years', $endDate = '+2 years', $timezone = null),
        'alq_precio'=> $faker->randomFloat($nbMaxDecimals = 2, $min = 500, $max = 1000),
        //'alq_detalle_trabajo'=>$faker->paragraph(),
        'alq_incidencia'=>$faker->randomElement([
            'Con incidencias',
            'Sin incidencias',
        ]),//fin incidencia
        'cliente_id' => App\Cliente::all()->random()->id,
        'trabajador_id' => App\Cliente::all()->random()->id,
    ];
});
