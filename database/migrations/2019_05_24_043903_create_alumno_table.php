<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {
            $table->bigIncrement('id');
            $table->integer('rut')->unique();
            $table->timestamps();
            $table->string("nombre", 30);
            $table->string("apellido_paterrno", 15);
            $table->string("apellido_materrno", 15);
            $table->integer("nivel");
            $table->string("ingreso",5); /* 1/2019 */ 
            $table->string("password",14);
            $table->integer("asignaturas_aprovadas");
            $table->float("nas");
            $table->float("ppa");
            $table->float("nar");
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
        Schema::dropIfExists('alumno');
    }
}
