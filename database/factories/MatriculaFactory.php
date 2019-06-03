<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\matricula;
use Faker\Generator as Faker;

$factory->define(matricula::class, function (Faker $faker) {
    return [
        //
		"estado_matricula" => $faker->randomElement($array = array ('pagado','no pagado')),
		"costo" => $faker->random_int(60000,65000),
    ];
});
