<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Nota;
use Faker\Generator as Faker;

$factory->define(Nota::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 100, $max = 120),
        'materia_id' => $faker->numberBetween($min = 1, $max = 20),
        'evaluacion' => $faker->numberBetween($min = 1, $max = 3),
        'nota' => $faker->numberBetween($min = 1, $max = 10),
    ];
});
