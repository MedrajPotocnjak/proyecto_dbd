<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Departamento;
use Faker\Generator as Faker;

$factory->define(Departamento::class, function (Faker $faker) {
	$RutCoord = App\CoordinadorDocente::pluck('rut')->toArray();
    return [
        //
        'nombre'=> $faker->randomElement($array = array ('departamento de ingenieria','departamento de humanidades')),
		'rut_coordinador'=>$faker->randomElement($RutCoord),
    ];
});
