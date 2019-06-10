<?php

use Illuminate\Database\Seeder;

class SolicitudTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		factory('App\Solicitud',10)->create();
    }
}
