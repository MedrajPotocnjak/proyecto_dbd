<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Mensaje;
use Faker\Generator as Faker;

$factory->define(mensaje::class, function (Faker $faker) {
	$RutProfesores = App\Profesor::pluck('rut')->toArray();
    return [
        //
		'asunto'=> $faker->sentence($nbWords = 6, $variableNbWords = true ),
		'contenido'=> $faker->sentence($nbWords = 200, $variableNbWords = true ),
		'rut_profesor' => $faker->randomElement($RutProfesores),
    ];
});
