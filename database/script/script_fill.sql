
insert into alumno(rut,nombre,apellido_paterno,apellido_materno,nivel,ingreso,password,asignaturas_aprobadas,nas,ppa,nar,fecha_nacimiento,nacionalidad,estado_civil,sexo,telefono,region,provincia,comuna,correo) values
(194653946,'Mateo','Rologo','Hoy',2,'2/2018','caca123',6,5.0,5.0,5.0,'1997-04-03','chileno','soltero','h','5691234560','loh rioh','provincia1','comuna1','porfadameun7@gmail.com');

insert into administrador(rut, nombre, apellido_paterno,apellido_materno,password) values
(104544545,'Julio','Profe','Profe','1234');
insert into asignatura(codigo,nombre, jornada, asistencia_minima,ponderacion,nivel,horas_teoria,horas_laboratorio,horas_ejercicios,version_plan_estudios) values
(999999,'Analisis de Cosas II','diurno',75,'70/30',1,3,1,0,'2012.3');

insert into coordinador_docente(rut, nombres, apellido_paterno,apellido_materno,password) values
(104544545,'Ivan','Torres','Diaz','1234');

insert into departamento(codigo,nombre,rut_coordinador) values
(999998,'Departamento de Ingeniera en Derecho',104544545);

insert into carrera(codigo,nombre, asignaturas_plan,cantidad_alumnos,arancel,codigo_departamento) values
(999997,'Ingenieria Civil en Derecho','60',300,4500000,999998);

insert into carrera_asignaturas(codigo_carrera,codigo_asignatura) values
(999997,999999);

insert into certificado(folio,codigo_verificacion,contenido,ruta_formato) values
(999996,'4389jfksnf','bla bla bla mr freeman','http//base.cl/formato.pdf');

insert into certificado_alumno(folio_certificado,rut_alumno) values
(999996,194653946);

insert into estudio(codigo_departamento,area,titulo,contenido,ruta_estudio) values
(999998,'Psicologia','Metodos de estudios','Bablabla estudio mucho wee','http//base.cl/estudios/1.pdf');

