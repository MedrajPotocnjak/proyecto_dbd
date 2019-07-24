<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordinadorDocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinador_docente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('rut')->unique();
			$table->string('password',255);
			$table->string('remember_token',100)->nullable();
			$table->string("nombres",30);
			$table->string("apellido_paterno",15);
			$table->string("apellido_materno",15);
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
        Schema::dropIfExists('coordinador_docente');
    }
}
