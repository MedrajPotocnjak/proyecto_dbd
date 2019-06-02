<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        /* Para utilizar los factorys creados::
        factory('app\administrador',2)->create();
        factory('app\alumno',10)->create();
        factory('app\asignatura',10)->create();
        factory('app\carrera',10)->create();
        factory('app\certificado',10)->create();
        factory('app\coordinador_docente',10)->create();
        factory('app\departamento',10)->create();
        factory('app\estudio',10)->create();
        factory('app\matricula',10)->create();
        factory('app\mensaje',10)->create();
        factory('app\mensualidad',10)->create();
        factory('app\pago',20)->create();
        factory('app\profesor',10)->create();
        factory('app\sala',10)->create();
        factory('app\seccion',10)->create();
        factory('app\solicitud',10)->create();
        factory('app\user',10)->create();
        */
    }
}
