<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Solicitud;
use Faker\Generator as Faker;

$factory->define(Solicitud::class, function (Faker $faker) {
    return [
        //
		//'fecha' => $faker->date($format = 'Y-m-d', $max = 'now'),
		'contenido' => $faker->text($maxNbChars = 100),
		'ruta_formato'=>'http//loa.solicitud.descarga',
    ];
});
