/* Trigger para el calculo del promedio cuando las notas han sido ingresadas */
CREATE OR REPLACE FUNCTION calcular_promedio()
RETURNS trigger AS
$BODY$
BEGIN
  	AVG(seccion_alumno.nota_p1, seccion_alumno.nota_p1nota_p2, seccion_alumno.nota_p1nota_p3, AVG(seccion_alumno.nota_p1nota_c1, seccion_alumno.nota_p1nota_c2, seccion_alumno.nota_p1nota_c3)) AS promedito
	UPDATE seccion_alumno
    SET promedio = promedito
    WHERE seccion_alumno.rut_alumno = NEW.rut_alumno;
    RETURN NEW;
END;
$BODY$
LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS promedio ON seccion_alumno;

CREATE TRIGGER promedio
BEFORE INSERT ON seccion_alumno
EXECUTE PROCEDURE calcular_promedio();

/*    */