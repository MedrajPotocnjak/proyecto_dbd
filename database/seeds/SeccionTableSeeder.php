<?php

use Illuminate\Database\Seeder;

class SeccionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		factory('App\Seccion',10)->create();
    }
}
