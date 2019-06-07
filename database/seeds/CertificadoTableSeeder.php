<?php

use Illuminate\Database\Seeder;

class CertificadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		factory('App\Certificado',10)->create();
    }
}
