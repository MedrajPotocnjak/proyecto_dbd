<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignatura', function (Blueprint $table) {
            $table->bigIncrements('codigo');
			$table->string("nombre",60);
			$table->string("jornada",10);
			$table->integer("asistencia_minima");
			$table->string("ponderacion",5);
			$table->integer("nivel");
			$table->integer("horas_teoria");
			$table->integer("horas_laboratorio");
			$table->integer("horas_ejercicios");
			$table->string("version_plan_estudios",6);
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
        Schema::dropIfExists('asignatura');
    }
}
