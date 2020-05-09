<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Repuesto;
use Faker\Generator as Faker;

$factory->define(Repuesto::class, function (Faker $faker) {
    return [
        'rep_categoria'=>$faker->randomElement([
            'Categoría A',
            'Categoría B',
            'Categoría C',
            'Categoría D',
            'Categoría E',
        ]),//fin maquina

        'rep_tipo'=>$faker->randomElement([
            'Tio A',
            'Tio B',
            'Tio C',
            
        ]),//fin maquina

        'rep_repuesto'=>$faker->randomElement([
            'Repuesto A',
            'Repuesto B',
            'Repuesto C',
            
        ]),//fin maquina

        'rep_estado'=>'Libre',
    ];
});
