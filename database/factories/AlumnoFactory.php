<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Alumno;
use Faker\Generator as Faker;

$factory->define(Alumno::class, function (Faker $faker) {
    return [
        //
        'rut'=> $faker->unique()->numberBetween($min = 100000000, $max = 999999999),
        'nombre' => $faker->firstName, 
        'apellido_paterno' => $faker->lastName,
        'apellido_materno' => $faker->lastName,
        "nivel" => $faker->numberBetween($min = 1, $max = 12),
        "ingreso" => $faker-> randomElement($array = array ('1/2018','2/2018','1/2019','2/1019')),
        "password" => '1234',
        "asignaturas_aprovadas" => $faker->numberBetween($min = 0, $max = 60),
        "nas" => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 5),
        "ppa" => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 5),
        "nar" => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 5),
        "fecha_nacimiento" => $faker-> date($format = 'Y-m-d', $max = 'now'),
        "nacionalidad" => $faker->randomElement($array = array ('chile','argentina','mexico')),
        "sexo" => $faker->randomElement($array = array ('m','h')),
		"estado_civil" => $faker->randomElement($array = array ('casado','soltero')),
        "telefono" => '123456789',
        "region" => $faker->randomElement($array = array ('santiago','arica','concepcion','region')),
        "provincia" => $faker->randomElement($array = array ('los rios','metropolitana','cordillera','provincia')),
        "comuna" => $faker->randomElement($array = array ('comuna 1','comuna 2','comuna 3','santiago')),
        "correo" => $faker-> safeEmail,
    ];
});
