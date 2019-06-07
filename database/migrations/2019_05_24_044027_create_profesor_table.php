<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('rut')->unique();
            $table->string("nombres", 30);
            $table->string("apellido_paterno", 15);
            $table->string("apellido_materno", 15);; 
            $table->string("password",14);
            $table->string("area",30);
            $table->dateTime("fecha_nacimiento");
            $table->string("nacionalidad",20);
            $table->char("sexo");
            $table->string("telefono",12);
            $table->string("region",30);
            $table->string("provincia",30);
            $table->string("comuna",30);
            $table->string("correo",40);
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
        Schema::dropIfExists('profesor');
    }
}
