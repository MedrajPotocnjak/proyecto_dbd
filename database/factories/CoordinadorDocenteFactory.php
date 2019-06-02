<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\coordinador_docente;
use Faker\Generator as Faker;

$factory->define(coordinador_docente::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstName, 
        'apellido_paterrno' => $faker->lastName,
        'apellido_materrno' => $faker->lastName,
    ];
});
