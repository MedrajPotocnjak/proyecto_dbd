<?php

use Illuminate\Database\Seeder;

class AdministradorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		factory('App\Administrador',2)->create();
    }
}
