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
            $table->timestamps();
            $table->integer('rut')->unique();
            $table->timestamps();
            $table->string("nombres", 30);
            $table->string("apellido_paterrno", 15);
            $table->string("apellido_materrno", 15);; 
            $table->string("password",14);
            $table->string("area",30);
            $table->timestamps("fecha_nacimiento");
            $table->string("nacionalidad",20);
            $table->string("nacionalidad",12);
            $table->char("sexo");
            $table->string("telefono",12);
            $table->string("region",30);
            $table->string("provincia",30);
            $table->string("comuna",30);
            $table->string("correo",40);
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
