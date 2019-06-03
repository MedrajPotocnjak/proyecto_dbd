<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\pago;
use Faker\Generator as Faker;

$factory->define(pago::class, function (Faker $faker) {
    return [
        //
		'tipo_pago' => $faker->randomElement($array = array ('m','a')),
		'forma_pago'=> $faker->numberBetween($min = 0, $max = 3), //efectivo, credito, debito
		'fecha_pago'=> $faker->dateTime($max = 'now', $timezone = null)
    ];
});
