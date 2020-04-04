<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'cli_nombre_empresa'=>'Construcciones'.' '.$faker->company(),
        'cli_nif'=>$faker->dni(),
        'cli_telefono'=>$faker->unique()->numberBetween(700000000, 999999999),
        'cli_email'=>$faker->freeEmail(),
        'cli_direccion'=>$faker->address(),
        'cli_pais'=>$faker->country(),
        'cli_ciudad'=>$faker->city(),
        'cli_fecha_alta'=>$faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null),
        'cli_nombre_contacto'=>$faker->firstName().' '.$faker->lastName().' '.$faker->lastName(),
    ];
});
