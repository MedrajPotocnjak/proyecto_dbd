<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago', function (Blueprint $table) {
            $table->bigIncrements('codigo');
			$table->integer('rut_alumno');
            $table->foreign('rut_alumno')
            ->references('rut')->on('alumno')->onDelete('cascade');
            $table->string('tipo_pago',1);
            $table->integer('forma_pago');
            $table->timestamps('fecha_pago');
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
        Schema::dropIfExists('pago');
    }
}
