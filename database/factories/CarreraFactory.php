<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\carrera;
use Faker\Generator as Faker;

$factory->define(carrera::class, function (Faker $faker) {
    return [
        'asignaturas_plan' => $faker-> numberBetween($min = 40, $max = 60),
        'cantidad_alumnos' => $faker->numberBetween($min = 20, $max = 80),
        'arancel' => $faker-> numberBetween($min = 3000000, $max = 5125000),
    ];
});
