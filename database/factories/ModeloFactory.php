<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Modelo;
use Faker\Generator as Faker;

$factory->define(Modelo::class, function (Faker $faker) {
    return [
        'mod_modelo'=>$faker->randomElement([
            'Modelo A',
            'Modelo B',
            'Modelo C',
        ]),//fin maquina
    ];
});
