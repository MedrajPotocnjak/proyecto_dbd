<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Certificado_Alumno;
use Faker\Generator as Faker;

$factory->define(Certificado_Alumno::class, function (Faker $faker) {
	$RutAlumno = DB::table('alumno')->select('id')->get()->toArray();
	$Folios = DB::table('certificado')->select('folio')->get()->toArray();
    return [
        //
		'rut_alumno'=>$faker->randomElement($RutAlumno),
		'folio_certificado'=>$faker->randomElement($Folios),
    ];
});
