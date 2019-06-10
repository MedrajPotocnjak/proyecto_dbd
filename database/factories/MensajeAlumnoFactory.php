<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use App\Alumno;
use App\Mensaje;
use App\Mensaje_Alumno;
use Faker\Generator as Faker;

$factory->define(Mensaje_Alumno::class, function (Faker $faker) {
	$RutAlumno = Alumno::all()->pluck('rut')->toArray();
	$IdMensaje = Mensaje::all()->pluck('id')->toArray();
    return [
        //
		'codigo_mensaje'=>$faker->randomElement($IdMensaje),
		'rut_alumno'=>$faker->randomElement($RutAlumno),
    ];
});
