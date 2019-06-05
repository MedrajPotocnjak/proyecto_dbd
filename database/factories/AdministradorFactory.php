<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Administrador;
use Faker\Generator as Faker;

$factory->define(Administrador::class, function (Faker $faker) {
    return [
        //
		'rut'=> $faker->unique()->numberBetween($min = 100000000, $max = 999999999),
		'nombre' => $faker->firstName, 
        'apellido_paterrno' => $faker->lastName,
        'apellido_materrno' => $faker->lastName,
		'password' => '1234',
    ];
});
