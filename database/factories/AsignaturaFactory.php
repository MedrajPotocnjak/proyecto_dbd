<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\asignatura;
use Faker\Generator as Faker;

$factory->define(asignatura::class, function (Faker $faker) {
    return [
        //
        'nombre' => $faker->randomElement($array = array ('20/80','100/0','50/50','75/25')),
        'jornada' => $faker->randomElement($array = array ('diurno','vespertino')),
        'asistencia_minima' => $faker->numberBetween($min = 50, $max = 100),
        'ponderacion' => $faker-> randomElement($array = array ('20/80','100/0','50/50','75/25')),
        'nivel' => $faker->numberBetween($min = 1, $max = 60),
        'horas_teoria' => $faker->numberBetween($min = 0, $max = 6),
        'horas_laboratorio' => $faker->numberBetween($min = 0, $max = 6),
        'horas_ejercicios' => $faker->numberBetween($min = 0, $max = 6),
        'version_plan_estudios' => $faker->,randomElement($array = array ('2001.1','2012.2','2015.3','2018.4')),
    ];
});
