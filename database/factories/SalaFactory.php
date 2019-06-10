<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Sala;
use Faker\Generator as Faker;

$factory->define(Sala::class, function (Faker $faker) {
    return [
        //
		'nombre' => $faker->buildingNumber,
		'ubicacion' => $faker->randomElement($array = array ('diinf 2 piso','eao 1 piso','dimension oscura')),
		'cantidad_puestos'=> $faker->numberBetween($min = 20, $max = 50),
		'cantidad_computadores'=> $faker->numberBetween($min = 0, $max = 20),
    ];
});
