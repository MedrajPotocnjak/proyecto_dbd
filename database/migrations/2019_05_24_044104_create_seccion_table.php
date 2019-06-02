<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seccion', function (Blueprint $table) {
            $table->bigIncrements('codigo');
            $table->foreign('rut_profesor')
            ->references('rut')->on('profesor');
            $table->foreign('codigo_asignatura')
            ->references('codigo')->on('asignatura')->onDelete('cascade');
            $table->integer("cupos");
			$table->char("tipo",1);
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
        Schema::dropIfExists('seccion');
    }
}
