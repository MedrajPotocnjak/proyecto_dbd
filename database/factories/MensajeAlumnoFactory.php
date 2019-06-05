<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Mensaje_Alumno;
use Faker\Generator as Faker;

$factory->define(Mensaje_Alumno::class, function (Faker $faker) {
	$RutAlumno = App\Alumno::pluck('rut')->toArray();
	$IdMensaje = App\Mensaje::pluck('id')->toArray();
    return [
        //
		'codigo_mensaje'=>$Faker->randomElement($IdMensaje),
		'rut_alumno'=>$Faker->randomElement($RutAlumno),
    ];
});
