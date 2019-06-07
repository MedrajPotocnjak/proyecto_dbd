<?php

use Illuminate\Database\Seeder;

class CertificadoAlumnoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		factory('App\Certificado_Alumno',10)->create();
    }
}
