<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */
use App\Alumno;
use App\Certificado;
use App\Certificado_Alumno;
use Faker\Generator as Faker;

$factory->define(Certificado_Alumno::class, function (Faker $faker) {
	$RutAlumno = Alumno::all()->pluck('rut')->toArray();
	$Folios = Certificado::all()->pluck('folio')->toArray();
    return [
        //
		'rut_alumno'=>$faker->randomElement($RutAlumno),
		'folio_certificado'=>$faker->randomElement($Folios),
    ];
});
