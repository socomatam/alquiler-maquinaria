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
        'maq_tipo'=>$faker->randomElement([
            'Excavadora',
            'Retroexcavadora',
            'Draga',
            'Volqueta',
        ]),//fin maquina
        'maq_categoria'=>$faker->randomElement([
            'Pesada',
            'Semipesada',
            'Ligera',
        ]),//fin maquina

        'maq_modelo'=>$faker->randomElement([
            'Modelo A',
            'Modelo B',
            'Modelo C',
        ]),//fin maquina

        'maq_traslacion'=>$faker->randomElement([
            'Rueda',
            'Oruga',
            'Fija',
        ]),//fin maquina

        'maq_peso'=>$faker->randomElement([
            55,
            100,
            800,
        ]),//fin maquina

        'maq_dimension_alto'=>$faker->randomElement([
            20,
            30,
            40,
        ]),//fin maquina

        'maq_dimension_ancho'=>$faker->randomElement([
            20,
            30,
            40,
        ]),//fin maquina

        'maq_dimension_largo'=>$faker->randomElement([
            20,
            30,
            40,
        ]),//fin maquina

        'maq_precio_dia'=>$faker->randomElement([
            300,
            80,
            500,
        ]),//fin maquina

        'maq_seguro'=> 'Vigente',
        
        'maq_estado' => 'Libre',
    ];
});
