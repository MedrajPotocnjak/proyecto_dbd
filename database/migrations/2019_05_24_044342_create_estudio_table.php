<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudio', function (Blueprint $table) {
            $table->bigIncrements('codigo');
			$table->integer('codigo_departamento');
            $table->foreign('codigo_departamento')
            ->references('codigo')->on('departamento')->onDelete('cascade');
			$table->string("area",32);
			$table->string("titulo");
			$table->string("contenido");
			$table->string("ruta_estudio");
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
        Schema::dropIfExists('estudio');
    }
}
