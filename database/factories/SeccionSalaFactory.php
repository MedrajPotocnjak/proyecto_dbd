<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Seccion_Sala;
use Faker\Generator as Faker;

$factory->define(Seccion_Sala::class, function (Faker $faker) {
	$CodSec = App\Seccion::pluck('codigo')->toArray();
	$CodSala = App\Sala::pluck('codigo')->toArray();
    return [
        //
		'codigo_seccion'=>$faker->randomElement($CodSec),
		'codigo_sala'=>$faker->randomElement($CodSala),
		'bloque'=>$faker->randomElement($array = array ('L','M','W','J','V')).$faker->numerify('#'),
    ];
});
