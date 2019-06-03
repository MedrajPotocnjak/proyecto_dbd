<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\sala;
use Faker\Generator as Faker;

$factory->define(sala::class, function (Faker $faker) {
    return [
        //
		'nombre' => $faker->buildingNumber,
		'ubicacion' => $faker->streetName,
		'cantidad_puestos'=> $faker->numberBetween($min = 20, $max = 50),
		'cantidad_computadores'=> $faker->numberBetween($min = 0, $max = 20),
    ];
});
