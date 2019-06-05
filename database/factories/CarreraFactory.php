<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Carrera;
use Faker\Generator as Faker;

$factory->define(Carrera::class, function (Faker $faker) {
	$CodigoDepartamento = App\Departamento::pluck('codigo')->toArray();
    return [
		'nombre'=> $faker-> sentence($nbWords = 6, $variableNbWords = true) 
        'asignaturas_plan' => $faker->numberBetween($min = 40, $max = 60),
        'cantidad_alumnos' => $faker->numberBetween($min = 20, $max = 80),
        'arancel' => $faker->numberBetween($min = 3000000, $max = 5125000),
		'codigo_departamento' => $faker->randomElement($CodigoDepartamento),
    ];
});
