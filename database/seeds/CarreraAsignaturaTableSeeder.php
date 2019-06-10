<?php

use Illuminate\Database\Seeder;

class CarreraAsignaturaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		factory('App\Carrera_Asignatura',10)->create();
    }
}
