<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Marca;
use Faker\Generator as Faker;

$factory->define(Marca::class, function (Faker $faker) {
    return [
        'mar_marca'=>$faker->randomElement([
            'Caterpillar',
            'Komatsu',
            'Terex',
            'Liebherr',
            'Hitachi',
            'Zoomlion',
        ]),//fin maquina
    ];
});
