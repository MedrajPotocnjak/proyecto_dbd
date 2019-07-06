CREATE OR REPLACE FUNCTION agregar_cupo() RETURNS trigger AS $agregar_cupo$
			DECLARE
			codigo_viejo INT;
			BEGIN
			IF TG_OP = 'DELETE' THEN
				codigo_viejo = OLD.codigo_seccion;
			UPDATE seccion
			SET cupos = cupos + 1
			WHERE seccion.codigo = codigo_viejo;
			RETURN NULL;
			END IF;
			END
            $agregar_cupo$ LANGUAGE plpgsql;
			
DROP TRIGGER IF EXISTS agregarcupo ON seccion_alumno;			

CREATE TRIGGER agregarcupo
BEFORE DELETE ON seccion_alumno
FOR EACH ROW
EXECUTE PROCEDURE agregar_cupo();