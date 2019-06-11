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
		//Model::unguard();
       
		//Model::reguard();
        
        $this->call(AlumnoTableSeeder::class);
		$this->call(AsignaturaTableSeeder::class);
		$this->call(ProfesorTableSeeder::class);
		$this->call(SalaTableSeeder::class);
        $this->call(SeccionTableSeeder::class);
        $this->call(CoordinadorDocenteTableSeeder::class);
		$this->call(DepartamentoTableSeeder::class);
		$this->call(CarreraTableSeeder::class);
		$this->call(CertificadoTableSeeder::class);
		
		
		$this->call(EstudioSeeder::class);
		$this->call(PagoTableSeeder::class);
		$this->call(MatriculaTableSeeder::class);
		$this->call(MensajeTableSeeder::class);
		
		//tablas intermedias
		$this->call(CarreraAsignaturaTableSeeder::class);
		$this->call(CertificadoAlumnoTableSeeder::class);//----
		$this->call(SeccionAlumnoTableSeeder::class);
		$this->call(SeccionSalaTableSeeder::class);
		$this->call(SolicitudAlumnoTableSeeder::class);
        $this->call(SolicitudTableSeeder::class);
        $this->call(MensajeAlumnoTableSeeder::class);//1
        $this->call(MensualidadTableSeeder::class);//2
        /*
        factory('app\Alumno',10)->create();
        factory('app\Asignatura',10)->create();
        factory('app\Carrera',10)->create();
        factory('app\Carrera_Asignatura',10)->create();
        factory('app\Certificado',10)->create();
        factory('app\Certificado_Alumno',10)->create();
        factory('app\CoordinadorDocente',3)->create();
        factory('app\Departamento',10)->create();
        factory('app\Estudio',10)->create();
        factory('app\Matricula',10)->create();
        factory('app\Mensaje',10)->create();
        factory('app\Mensaje_Alumno',10)->create();
        factory('app\Mensualidad',10)->create();
        factory('app\Pago',20)->create();
        factory('app\Profesor',10)->create();
        factory('app\Sala',10)->create();
        factory('app\Seccion',10)->create();
        factory('app\Seccion_Sala',10)->create();
        factory('app\Seccion_Alumno',10)->create();
        factory('app\Solicitud',10)->create();
		actory('app\Solicitud_Alumno',10)->create();
        factory('app\User',10)->create();
        factory('app\Administrador',2)->create();
		*/
    }
}
