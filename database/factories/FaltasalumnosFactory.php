<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Faltaalumno;
use Faker\Generator as Faker;

$factory->define(Faltaalumno::class, function (Faker $faker) {
    return [
        'alumno' => $faker->randomNumber(),
        'asiste' => $faker->boolean($chanceOfGettingTrue = 50),
        'retraso' => $faker->boolean($chanceOfGettingTrue = 70),
        'justificada' => $faker->boolean($chanceOfGettingTrue = 20),
        'periodoclase_id' => $faker->randomNumber()
    ];
});
