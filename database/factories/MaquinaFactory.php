<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Maquina;
use Faker\Generator as Faker;

$factory->define(Maquina::class, function (Faker $faker) {
    return [
        'maq_marca'=>$faker->randomElement([
            'Caterpillar',
            'Komatsu',
            'Terex',
            'Liebherr',
            'Hitachi',
            'Zoomlion',
        ]),//fin maquina
    ];
});
