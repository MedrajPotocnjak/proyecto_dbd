<?php

use Illuminate\Database\Seeder;

class SeccionSalaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		factory('App\Seccion_Sala',10)->create();
    }
}
