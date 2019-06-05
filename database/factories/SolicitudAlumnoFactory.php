<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Solicitud_Alumno;
use Faker\Generator as Faker;

$factory->define(Solicitud_Alumno::class, function (Faker $faker) {
	$RutAlumno = App\Alumno::pluck('rut')->toArray();
	$CodigoSolicitud = App\Solicitud::pluck('codigo')->toArray();
    return [
        //
		'rut_alumno'=>$faker->randomElement($RutAlumno),
		'codigo_solicitud'=>$faker->randomElement($CodigoSolicitud),
    ];
});
