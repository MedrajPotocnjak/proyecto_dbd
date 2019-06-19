<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeccionTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement
        ('
            CREATE OR REPLACE FUNCTION crear_seccion()
            RETURNS trigger AS
            $$
                BEGIN
                FROM Seccion AS s , Asignatura AS a
                /*CREATE Seccion*/
                SET s.nombre = "A-1"
                SET s.cupos = 30
                SET s.tipo = "t"
                SET s.rut_profesor = 187695783
                SET s.codigo_asignatura = NEW.id
                RETURN NEW;
                END;
            $$
            LANGUAGE plpgsql;
        ');
        DB::unprepared
        ('
            CREATE TRIGGER Seccion
            AFTER INSERT ON Asignatura
            EXECUTE PROCEDURE crear_seccion();
        ');  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seccion_trigger');
    }
}
