<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeccionSalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seccion_sala', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->integer('codigo_seccion');
            $table->foreign('codigo_seccion')
            ->references('codigo')->on('seccion')->onDelete('cascade');
			$table->integer('codigo_sala');
            $table->foreign('codigo_sala')
            ->references('codigo')->on('sala')->onDelete('cascade');
            $table->string('bloque',2);
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
        Schema::dropIfExists('seccion_sala');
    }
}
