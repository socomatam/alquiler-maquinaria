<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categoria;
use Faker\Generator as Faker;

$factory->define(Categoria::class, function (Faker $faker) {
    return [
        'cat_categoria'=>$faker->randomElement([
            'Pesada',
            'Semipesada',
            'Ligera',
        ]),//fin incidencia
    ];
});
