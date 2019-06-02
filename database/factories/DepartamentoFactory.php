<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\departamento;
use Faker\Generator as Faker;

$factory->define(departamento::class, function (Faker $faker) {
    return [
        //
        'nombre'=> $faker->randomElement($array = array ('departamento de ingenieria','departamento de humanidades')),
    ];
});
