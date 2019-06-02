<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensualidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensualidad', function (Blueprint $table) {
            $table->bigIncrements('codigo');
            $table->foreign('codigo_pago')
            ->references('codigo')->on('pago')->onDelete('cascade');
            $table->integer('numero_mensualidad');
            $table->integer('costo');
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
        Schema::dropIfExists('mensualidad');
    }
}
