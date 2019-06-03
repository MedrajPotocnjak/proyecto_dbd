<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\seccion;
use Faker\Generator as Faker;

$factory->define(seccion::class, function (Faker $faker) {
	$valor=$faker->numberBetween($min = 0, $max = 100);
    return [
        //
		'nombre'=>$faker->bs,
		'cupos'=>$faker->randomElement($array = array (30,40,50)),
		'tipo'=>$faker->randomElement($array = array ('t','e','l')),
    ];
});
