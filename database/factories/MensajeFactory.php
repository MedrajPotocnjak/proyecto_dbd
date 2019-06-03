<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\mensaje;
use Faker\Generator as Faker;

$factory->define(mensaje::class, function (Faker $faker) {
    return [
        //
		'asunto'-> $faker->sentence($nbWords = 6, $variableNbWords = true );
		'contenido'-> $faker->sentence($nbWords = 200, $variableNbWords = true );
		'fecha'->$faker->dateTime($max = 'now', $timezone = null),
    ];
});
