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
            CREATE OR REPLACE FUNCTION quitar_cupo() RETURNS trigger AS $quitar_cupo$
			BEGIN
			
			UPDATE seccion
			SET cupos = cupos - 1
			WHERE seccion.codigo = (SELECT alusec.codigo_seccion
									FROM seccion_alumno as alusec
									WHERE alusec.codigo = (SELECT max(codigo)
														   FROM seccion_alumno)
									);
			RETURN NULL;
			END
            $quitar_cupo$ LANGUAGE plpgsql;
        ');
        DB::unprepared
        ('
            CREATE TRIGGER seccion_alumno
            AFTER INSERT ON seccion_alumno
            EXECUTE PROCEDURE quitar_cupo();
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
