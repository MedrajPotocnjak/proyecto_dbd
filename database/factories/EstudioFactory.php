<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\estudio;
use Faker\Generator as Faker;

$factory->define(estudio::class, function (Faker $faker) {
    return [
        //
        'area' => $faker-> randomElement($array = array ('area1','area2','area3')),
        'titulo' => $faker->randomElement($array = array ('estudio de notas','estudio de asistencia')),
        'contenido' => $faker->text($maxNbChars = 100),
        'ruta_estudio' => $faker->randomElement($array = array ('direccion1','direccion2','direccion3')),
    ];
});
