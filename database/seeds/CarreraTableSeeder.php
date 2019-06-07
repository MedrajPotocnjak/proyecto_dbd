<?php

use Illuminate\Database\Seeder;

class CarreraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		factory('App\Carrera',10)->create();
    }
}
