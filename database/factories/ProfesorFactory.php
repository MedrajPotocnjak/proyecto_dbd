<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\profesor;
use Faker\Generator as Faker;

$factory->define(profesor::class, function (Faker $faker) {
    return [
        //
        'rut'=> $faker->unique()->numberBetween($min = 10000000, $max = 999999999),
        'nombre' => $faker->firstName, 
        'apellido_paterno' => $faker->lastName,
        'apellido_materno' => $faker->lastName,
        "nivel" => $faker->random_int(1,12),
        "ingreso" => $faker-> randomElement($array = array ('1/2018','2/2018','1/2019','2/1019')),
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
