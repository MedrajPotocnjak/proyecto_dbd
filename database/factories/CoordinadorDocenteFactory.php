<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\CoordinadorDocente;
use Faker\Generator as Faker;

$factory->define(CoordinadorDocente::class, function (Faker $faker) {
    return [
		'rut'=> $faker->unique()->numberBetween($min = 100000000, $max = 999999999),
        'nombres' => $faker->firstName, 
        'apellido_paterno' => $faker->lastName,
        'apellido_materno' => $faker->lastName,
		'password' => '1234',
    ];
});

//
//$algo_ide  = DN::table()->select(id)->Get();
//return ["algo_ide"=> $id->random()->id;]