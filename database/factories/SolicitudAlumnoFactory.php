<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Solicitud_Alumno;
use Faker\Generator as Faker;
use App\Alumno;
use App\Solicitud;

$factory->define(Solicitud_Alumno::class, function (Faker $faker) {
	$RutAlumno = Alumno::inRandomOrder()->first();//Alumno::pluck('rut')->toArray();
	$CodigoSolicitud = Solicitud::inRandomOrder()->first();//Solicitud::pluck('codigo')->toArray();
    return [
        //
		'rut_alumno'=>$RutAlumno->random('id'),
		'codigo_solicitud'=>$CodigoSolicitud->random('codigo'),
    ];
});
