/* Trigger para el calculo del promedio cuando las notas han sido ingresadas */
CREATE OR REPLACE FUNCTION calcular_promedio()
RETURNS trigger AS
$calcular_promedio$
DECLARE
prom_control float;
prom_notas float;

BEGIN
	SELECT AVG(
  	UPDATE seccion_alumno
    SET promedio = (nota_p1 + nota_p2 + nota_p3 + (nota_c1 + nota_c2 + nota_c3) ) / 4
    RETURN NULL;
END;
$calcular_promedio$
LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS promedio ON seccion_alumno;

CREATE TRIGGER promedio
AFTER UPDATE ON seccion_alumno
EXECUTE PROCEDURE calcular_promedio();

/*    */