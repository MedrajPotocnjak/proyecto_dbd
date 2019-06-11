<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Mensualidad;
use Faker\Generator as Faker;

$factory->define(Mensualidad::class, function (Faker $faker) {
	$CodigoPago = App\Pago::pluck('codigo')->toArray();
    return [
        //
		'numero_mensualidad'->numberBetween($min = 1, $max = 12),
		'costo'->numberBetween($min = 200000, $max = 450000),
		'codigo_pago' => $faker->randomElement($CodigoPago),
    ];
});
