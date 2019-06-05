<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Seccion_Alumno;
use Faker\Generator as Faker;

$factory->define(Seccion_Alumno::class, function (Faker $faker) {
	$RutAlumno = App\Alumno::pluck('rut')->toArray();
	$CodigoSeccion = App\Seccion::pluck('codigo')->toArray();
    return [
        //
		'rut_alumno'=>$faker->randomElement($RutAlumno),
		'codigo_seccion'=>$faker->randomElement($CodigoSeccion),
		'nota_p1'=>$faker->randomFloat($nbMaxDecimals = 1, $min = 2, $max = 7), 
		'nota_p2'=>$faker->randomFloat($nbMaxDecimals = 1, $min = 2, $max = 7), 
		'nota_p3'=>$faker->randomFloat($nbMaxDecimals = 1, $min = 2, $max = 7),
		'nota_c1'=>$faker->randomFloat($nbMaxDecimals = 1, $min = 2, $max = 7),
		'nota_c2'=>$faker->randomFloat($nbMaxDecimals = 1, $min = 2, $max = 7),
		'nota_c3'=>$faker->randomFloat($nbMaxDecimals = 1, $min = 2, $max = 7),
		'promedio'=>$faker->randomFloat($nbMaxDecimals = 1, $min = 2, $max = 7),
		'estado_cursado'=>$faker->randomElement($array = array ('s','n')),
		'aprovado'=>$faker->randomElement($array = array (1,0)),
		'estado_cursado'=>$faker->randomElement($array = array ('s','n')),
    ];
});
