<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Carrera_Asignatura;
use Faker\Generator as Faker;

$factory->define(Carrera_Asignatura::class, function (Faker $faker) {
	$CodigoAsignatura = App\Asignatura::pluck('codigo')->toArray();
	$CodigoCarrera = App\Carrera::pluck('codigo')->toArray();
    return [
        //
		'codigo_asignatura'=> $faker->randomElement($CodigoAsignatura),
		'codigo_carrera'=> $faker->randomElement($CodigoCarrera),
    ];
});
