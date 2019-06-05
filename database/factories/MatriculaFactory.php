<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Matricula;
use Faker\Generator as Faker;

$factory->define(Matricula::class, function (Faker $faker) {
	$CodigoPago = App\Pago::pluck('codigo')->toArray();
    return [
        //
		'estado_matricula' => $faker->randomElement($array = array ('pagado','no pagado')),
		'costo' => 65000,
		'codigo_pago' => $faker->randomElement($CodigoPago),
    ];
});
