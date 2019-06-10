<?php

use Illuminate\Database\Seeder;

class SeccionAlumnoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		factory('App\Seccion_Alumno',10)->create();
    }
}
