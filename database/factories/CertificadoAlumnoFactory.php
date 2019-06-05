<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Certificado_Alumno;
use Faker\Generator as Faker;

$factory->define(Certificado_Alumno::class, function (Faker $faker) {
	$RutAlumno = App\Alumno::pluck('rut')->toArray();
	$Folios = App\Certificado::pluck('folio')->toArray();
    return [
        //
		'rut_alumno'=>$faker->randomElement($RutAlumno),
		'folio_certificado'=>$faker->randomElement($Folios);
    ];
});
