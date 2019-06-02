<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoSeccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_seccion', function (Blueprint $table) {
            $table->bigIncrements('codigo');
			$table->integer('rut_alumno');
            $table->foreign('rut_alumno')
            ->references('rut')->on('alumno')->onDelete('cascade');
			$table->integer('codigo_seccion');
            $table->foreign('codigo_seccion')
            ->references('codigo')->on('seccion')->onDelete('cascade');
            $table->smallInteger("aprobado");
            $table->float('promedio');
            $table->float('nota_p1');
            $table->float('nota_p2');
            $table->float('nota_p3');
            $table->float('nota_c1');
            $table->float('nota_c2');
            $table->float('nota_c3');
            $table->string('estado_cursado',1);
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
        Schema::dropIfExists('alumno_seccion');
    }
}
