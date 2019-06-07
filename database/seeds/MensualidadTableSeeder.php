<?php

use Illuminate\Database\Seeder;

class MensualidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		factory('App\Mensualidad',10)->create();
    }
}
