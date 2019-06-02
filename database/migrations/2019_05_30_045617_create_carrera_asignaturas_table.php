<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarreraAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrera_asignaturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('codigo_carrera')
            ->references('codigo')->on('carrera')->onDelete('cascade');
            $table->foreign('codigo_asignatura')
            ->references('codigo')->on('asignatura')->onDelete('cascade');
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
        Schema::dropIfExists('carrera_asignaturas');
    }
}
