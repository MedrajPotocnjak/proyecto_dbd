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
        
        
        factory('app\Alumno',10)->create();
        factory('app\Asignatura',10)->create();
        factory('app\Carrera',10)->create();
        factory('app\CarreraAsignatura',10)->create();
        factory('app\Certificado',10)->create();
        factory('app\CertificadoAlumno',10)->create();
        factory('app\Coordinador_docente',3)->create();
        factory('app\Departamento',10)->create();
        factory('app\Estudio',10)->create();
        factory('app\Matricula',10)->create();
        factory('app\Mensaje',10)->create();
        factory('app\MensajeAlumno',10)->create();
        factory('app\Mensualidad',10)->create();
        factory('app\Pago',20)->create();
        factory('app\Profesor',10)->create();
        factory('app\Sala',10)->create();
        factory('app\Seccion',10)->create();
        factory('app\SeccionSala',10)->create();
        factory('app\SeccionAlumno',10)->create();
        factory('app\Solicitud',10)->create();
        factory('app\User',10)->create();
        factory('app\Administrador',2)->create();

    }
}
