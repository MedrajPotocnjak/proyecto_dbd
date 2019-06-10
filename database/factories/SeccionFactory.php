<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Seccion;
use App\Asignatura;
use App\Profesor;
use Faker\Generator as Faker;

$factory->define(Seccion::class, function (Faker $faker) {
	$RutProfesor = Profesor::all()->pluck('rut')->toArray();
	$CodAsig = Asignatura::all()->pluck('codigo')->toArray();
    return [
        //
		'nombre'=>$faker->bs,
		'cupos'=>$faker->randomElement($array = array (30,40,50)),
		'tipo'=>$faker->randomElement($array = array ('t','e','l')),
		'codigo_asignatura'=>$faker->randomElement($CodAsig),
		'rut_profesor'=>$faker->randomElement($RutProfesor),
    ];
});
