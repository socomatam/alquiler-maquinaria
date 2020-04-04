<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Trabajo;
use Faker\Generator as Faker;

$factory->define(Trabajo::class, function (Faker $faker) {
    return [
        'tra_nombre_trabajo'=>$faker->unique()->randomElement([
            'Excavación',
            'Nivelación de terreno',
            'Cimentar',
            'Canalización',
            'Drenado',
            'Asfaltado',
        ]),//fin nombre trabajos
    ];//fin return
});
