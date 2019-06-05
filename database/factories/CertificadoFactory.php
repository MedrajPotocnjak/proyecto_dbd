<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Certificado;
use Faker\Generator as Faker;

$factory->define(Certificado::class, function (Faker $faker) {
	
    return [
        'codigo_verificacion' => $faker->unique->password,
        'contenido' => $faker-> $faker->text($maxNbChars = 100),
        'fecha' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'ruta_formato' => '.pdf',
    ];
});
