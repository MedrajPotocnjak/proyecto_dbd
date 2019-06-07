<?php

use Illuminate\Database\Seeder;

class SolicitudAlumnoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		factory('App\Solicitud_Alumno',10)->create();
    }
}
