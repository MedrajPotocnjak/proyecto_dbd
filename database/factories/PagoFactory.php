<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Pago;
use Faker\Generator as Faker;

$factory->define(Pago::class, function (Faker $faker) {
	$RutAlumno = App\Alumno::pluck('rut')->toArray();
    return [
        //
		'tipo_pago' => $faker->randomElement($array = array ('m','a')),
		'forma_pago'=> $faker->numberBetween($min = 0, $max = 3), //efectivo, credito, debito
		'fecha_pago'=> $faker->dateTime($max = 'now', $timezone = null),
		'rut_alumno'=> $faker->randomElement(RutAlumno),
    ];
});
