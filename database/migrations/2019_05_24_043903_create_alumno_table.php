<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {
			$table->bigIncrements('id');
            $table->integer('rut')->unique();
            $table->string('nombre', 30);
            $table->string('apellido_paterno', 15);
            $table->string('apellido_materno', 15);
            $table->integer('nivel');
            $table->string('ingreso',6); /* 1/2019 */ 
            $table->string('password',255);
			$table->string('remember_token',100)->nullable();
            $table->integer('asignaturas_aprobadas');
            $table->float('nas');
            $table->float('ppa');
            $table->float('nar');
            $table->dateTime('fecha_nacimiento');
            $table->string('nacionalidad',20);
            $table->string('estado_civil',12);
            $table->char('sexo');
			$table->string('targeta_credito',16)->nullable();
			$table->string('fecha_caducidad',5)->nullable();
			$table->string('cvc',3)->nullable();
			$table->integer('codigo_carrera');
            $table->foreign('codigo_carrera')
            ->references('codigo')->on('carrera')->onDelete('cascade');
            $table->string('telefono',12);
            $table->string('region',30);
            $table->string('provincia',30);
            $table->string('comuna',30);
            $table->string('correo',40);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno');
    }
}
