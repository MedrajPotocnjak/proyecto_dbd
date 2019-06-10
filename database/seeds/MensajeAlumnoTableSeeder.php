<?php

use Illuminate\Database\Seeder;

class MensajeAlumnoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		factory('App\Mensaje_Alumno',10)->create();
    }
}
