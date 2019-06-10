<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Profesor;
use Faker\Generator as Faker;

$factory->define(Profesor::class, function (Faker $faker) {
    return [
        //
        'rut'=> $faker->unique()->numberBetween($min = 10000000, $max = 999999999),
        'nombres' => $faker->firstName, 
        'apellido_paterno' => $faker->lastName,
        'apellido_materno' => $faker->lastName,
		"password" => '1234',
        'area' => $faker->randomElement($array = array ('area1','area2','area3','area4')),
        "fecha_nacimiento" => $faker-> date($format = 'Y-m-d', $max = 'now'),
        "nacionalidad" => $faker->randomElement($array = array ('chile','argentina','mexico')),
        "sexo" => $faker->randomElement($array = array ('m','h')),
        "telefono" => '123456789',
        "region" => $faker->randomElement($array = array ('santiago','arica','concepcion','region')),
        "provincia" => $faker->randomElement($array = array ('los rios','metropolitana','cordillera','provincia')),
        "comuna" => $faker->randomElement($array = array ('comuna 1','comuna 2','comuna 3','santiago')),
        "correo" => $faker-> safeEmail,
    ];
});
