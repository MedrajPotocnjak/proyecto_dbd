<?php

use Illuminate\Database\Seeder;

class PagoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		factory('App\Pago',10)->create();
    }
}
