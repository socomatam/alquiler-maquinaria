<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Desplazamiento;
use Faker\Generator as Faker;

$factory->define(Desplazamiento::class, function (Faker $faker) {
    return [
        'des_desplazamiento'=>$faker->randomElement([
            'Rueda',
            'Oruga',
            'Fija',
        ]),//fin maquina
    ];
});
