<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Trabajadore;
use Faker\Generator as Faker;

$factory->define(Trabajadore::class, function (Faker $faker) {
    return [
        'tra_nombre_trabajador'=>$faker->firstName(),
        'tra_apellido_1'=>$faker->lastName(),
        'tra_apellido_2'=>$faker->lastName(),
        'tra_fecha_nacimiento'=>$faker->dateTimeBetween($startDate = '-50 years', $endDate = '-20 years', $timezone = null),
        'tra_telefono'=>$faker->unique()->numberBetween(600000000, 799999999),
        'tra_email'=>$faker->freeEmail(),
        'tra_dni'=>$faker->dni(),
        'tra_fecha_alta'=>$faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null),

    ];
});
