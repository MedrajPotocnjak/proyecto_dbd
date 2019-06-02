<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\certificado;
use Faker\Generator as Faker;

$factory->define(certificado::class, function (Faker $faker) {
    return [
        'codigo_verificacion' => $faker->randomElement($array = array ('sdf4s5df8','sdfc85ds2','f5ddf66g3','dsfsdsefc8d5d4ds5')),
        'contenido' => $faker-> $faker->text($maxNbChars = 100),
        'fecha' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'ruta_formato' => '.pdf',
    ];
});
