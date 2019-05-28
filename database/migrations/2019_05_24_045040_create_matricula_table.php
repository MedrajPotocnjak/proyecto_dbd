<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matricula', function (Blueprint $table) {
            $table->bigIncrements('codigo_matricula');
            /* Pendiente: Considerar que la llave foranea es el rut del alumno */
            $table->foreing('rut')->references('rut')->on-('alumno')->onDelete('cascade');
             $table->string('estado_matricula',20);
             /*Como integer ya que money es raro D:*/
            $table->integer('costo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matricula');
    }
}
