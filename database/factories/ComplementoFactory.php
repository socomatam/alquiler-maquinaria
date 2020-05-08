<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Complemento;
use Faker\Generator as Faker;

$factory->define(Complemento::class, function (Faker $faker) {
    return [
        'com_complemento'=>$faker->randomElement([
            'Complemento A',
            'Complemento B',
            'Complemento C',
            'Complemento D',
            'Complemento E',
        ]),//fin maquina

        'com_tipo'=>$faker->randomElement([
            'Tio A',
            'Tio B',
            'Tio C',
            
        ]),//fin maquina

        'com_precio'=>$faker->randomElement([
            100,
            200,
            300,
        ]),//fin maquina
        

        'com_estado'=>'Libre',
    ];
});
