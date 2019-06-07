<?php

use Illuminate\Database\Seeder;

class CoordinadorDocenteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		factory('App\CoordinadorDocente',10)->create();
    }
}
