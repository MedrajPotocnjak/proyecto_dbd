<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Solicitud_Alumno;
use Faker\Generator as Faker;
use App\Alumno;
use App\Solicitud;

$factory->define(Solicitud_Alumno::class, function (Faker $faker) {
	$RutAlumno = Alumno::all()->pluck('rut')->toArray();
	$CodigoSolicitud = Solicitud::all()->pluck('codigo')->toArray();
    return [
        //
		'rut_alumno'=>$faker->randomElement($RutAlumno),
		'codigo_solicitud'=>$faker->randomElement($CodigoSolicitud),
    ];
});
