<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\solicitud;
use Faker\Generator as Faker;

$factory->define(solicitud::class, function (Faker $faker) {
    return [
        //
		'fecha' => $faker->date($format = 'Y-m-d', $max = 'now'),
		'contenido' => $faker-> $faker->text($maxNbChars = 100),
		'ruta_formato'=>$faker->$url,
    ];
});
