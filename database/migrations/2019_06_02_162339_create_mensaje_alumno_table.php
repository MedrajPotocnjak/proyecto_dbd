<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajeAlumnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensaje_alumno', function (Blueprint $table) {
            $table->bigIncrements('codigo');
			$table->integer('codigo_mensaje');
			$table->foreign('codigo_mensaje')
            ->references('id')->on('mensaje')->onDelete('cascade');
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
        Schema::dropIfExists('mensaje_alumno');
    }
}
