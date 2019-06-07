<?php

use Illuminate\Database\Seeder;

class ProfesorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		factory('App\Profesor',10)->create();
    }
}
