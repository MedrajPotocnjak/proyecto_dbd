<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Seccion;
use Faker\Generator as Faker;

$factory->define(Seccion::class, function (Faker $faker) {
	$RutProfesor = App\Profesor::pluck('rut')->toArray();
	$CodAsig = App\Asignatura::pluck('codigo')->toArray();
    return [
        //
		'nombre'=>$faker->bs,
		'cupos'=>$faker->randomElement($array = array (30,40,50)),
		'tipo'=>$faker->randomElement($array = array ('t','e','l')),
		'codigo_asignatura'=>$faker->randomElement($CodAsig),
		'rut_profesor'=>$faker->randomElement($$RutProfesor ),
    ];
});
