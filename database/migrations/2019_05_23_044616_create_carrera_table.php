<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarreraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrera', function (Blueprint $table) {
            $table->bigIncrements('codigo');
			$table->integer('codigo_departamento');
            $table->foreign('codigo_departamento')
            ->references('codigo')->on('departamento')->onDelete('cascade');
            $table->string("nombre",60);
			$table->smallInteger("asignaturas_plan");
			$table->smallInteger("cantidad_alumnos");
			$table->Integer("arancel");
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
        Schema::dropIfExists('carrera');
    }
}
