<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Seccion;
use App\Sala;
use App\Seccion_Sala;
use Faker\Generator as Faker;

$factory->define(Seccion_Sala::class, function (Faker $faker) {
	$CodSec = Seccion::all()->pluck('codigo')->toArray();
	$CodSala =Sala::all()->pluck('codigo')->toArray();
    return [
        //
		'codigo_seccion'=>$faker->randomElement($CodSec),
		'codigo_sala'=>$faker->randomElement($CodSala),
		'bloque'=>$faker->randomElement($array = array ('L','M','W','J','V')).$faker->randomElement($array= array(1,2,3,4,5,6)),
    ];
});
