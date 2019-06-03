<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\mensualidad;
use Faker\Generator as Faker;

$factory->define(mensualidad::class, function (Faker $faker) {
    return [
        //
		'numero_mensualidad'->random_int(1,12),
		'costo'->numberBetween($min = 200000, $max = 450000),
    ];
});
