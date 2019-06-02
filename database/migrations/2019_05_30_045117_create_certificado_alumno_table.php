<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificadoAlumnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificado_alumno', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('codigo_solicitud');
            $table->foreign('codigo_solicitud')
            ->references('codigo')->on('solicitud')->onDelete('cascade');
			$table->integer('rut_alumno');
            $table->foreign('rut_alumno')
            ->references('rut')->on('alumno')->onDelete('cascade');
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
        Schema::dropIfExists('certificado_alumno');
    }
}
