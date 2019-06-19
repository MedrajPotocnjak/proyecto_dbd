
insert into administrador(id,rut, nombre, apellido_paterno,apellido_materno,password) values
(DEFAULT,104544545,'Julio','Profe','Profe','1234');

insert into alumno(id,rut,nombre,apellido_paterno,apellido_materno,nivel,ingreso,password,asignaturas_aprobadas,nas,ppa,nar,fecha_nacimiento,nacionalidad,estado_civil,sexo,telefono,region,provincia,comuna,correo) values
(DEFAULT,194653946,'Mateo','Rologo','Hoy',2,'2/2018','caca123',6,5.0,5.0,5.0,'1997-04-03','chileno','soltero','h','5691234560','loh rioh','provincia1','comuna1','porfadameun7@gmail.com'),
(DEFAULT,194875764,'Lola','Mento','Alvarez',5,'1/2016','caca123',21,4.2,4.0,4.0,'1998-11-03','chileno','soltero','m','5691234560','metropolitana','provincia1','comuna1','hola123@gmail.com'),
(DEFAULT,194875766,'Meper','Donas','Gatito',1,'1/2019','caca123',0,1.0,1.0,1.0,'1994-11-03','chileno','casado','h','5691234560','metropolitana','provincia1','Lo barnechea','meperdonas@gmail.com');

insert into asignatura(codigo,nombre, jornada, asistencia_minima,ponderacion,nivel,horas_teoria,horas_laboratorio,horas_ejercicios,version_plan_estudios) values
(999999,'Analisis de Cosas II','diurno',75,'70/30',1,3,1,0,'2012.3'),
(999988,'Introduccion a Introducir','vespertino',100,'100/0',1,4,0,0,'2012.3'),
(999987,'Diseño de Base de Gatos','diurno',100,'100/0',1,4,0,0,'2012.3'),
(999986,'Modelación y Panaderia','diurno',75,'100/0',5,3,0,1,'2012.3'),
(999985,'Sistemas Inoperantes','vespertino',100,'70/30',4,4,1,0,'2012.3'),
(999984,'Organización de Cables','diurno',100,'70/30',2,4,1,0,'2012.3');

insert into profesor(id,rut,nombre,apellido_paterno,apellido_materno,password,area,fecha_nacimiento,nacionalidad,sexo,telefono,region,provincia,comuna,correo) values
(DEFAULT,113456723,'Luis','Hernandez', 'Diaz','1234','Psicologia','1980-01-03','chileno','h','5691234560','El maule', 'provincia1','comuna1','no.fake@usach.cl'),
(DEFAULT,104383478,'Juan Carlos','Bodoque', 'Bodoque','1234','Informática','1976-03-01','chileno','h','5691234560','Metropolitana', 'provincia1','comuna1','profe.hola@usach.cl');

insert into sala(codigo,nombre,ubicacion,cantidad_puestos,cantidad_computadores) values
(999990,'203','Piso 2 Diinf',40,0),
(999983,'511','Subterraneo 2 Diinf',40,0);

insert into seccion(codigo,nombre,tipo,cupos,rut_profesor,codigo_asignatura) values
(999995,'Analisis de Cosas II','t',40,113456723,999999),
(999982,'Analisis de Cosas II','l',40,113456723,999999),
(999979,'Diseño de Base de Gatos','t',40,104383478,999987);


insert into coordinador_docente(id,rut, nombres, apellido_paterno,apellido_materno,password) values
(DEFAULT,104544545,'Ivan','Torres','Diaz','1234'),
(DEFAULT,234890243,'Felipe','Camiroaga','Diaz','1234');

insert into departamento(codigo,nombre,rut_coordinador) values
(999998,'Departamento de Ingeniera en Derecho',104544545),
(999981,'Departamento de Aeronautica',234890243);

insert into carrera(codigo,nombre, asignaturas_plan,cantidad_alumnos,arancel,codigo_departamento) values
(999997,'Ingenieria Civil en Derecho',60,300,4500000,999998),
(929997,'Pedagogía en Ganaderia Nuclea',50,300,3500000,999981);

insert into certificado(folio,codigo_verificacion,contenido,ruta_formato) values
(999996,'4389jfksnf','bla bla bla mr freeman','http//base.cl/formato.pdf');

insert into solicitud(codigo,contenido,ruta_formato) values
(999994,'bla bla bla mr freeman','http//base.cl/formato.pdf');

insert into estudio(codigo_departamento,area,titulo,contenido,ruta_estudio) values
(999998,'Psicologia','Metodos de estudios','Bablabla estudio mucho wee','http//base.cl/estudios/1.pdf'),
(999981,'Panaderia','Metodos de estudios','Bablabla estudio mucho wee','http//base.cl/estudios/1.pdf');

insert into pago(codigo,rut_alumno,tipo_pago,forma_pago) values 
(999993,194653946,'m',0),
(999989,194653946,'a',0),
(999979,194653946,'m',0);

insert into matricula(codigo,codigo_pago,estado_matricula,costo) values
(999992,999993,'pagado',65000),
(999980,999979,'pagado',65000);

insert into mensaje(id,asunto,contenido,rut_profesor) values
(999991,'Sala PA', 'Profe, para cuando es la PA?',113456723),
(999978,'Re: Sala PA', 'Pal proximo semestre. Aproveche las vacaciones y conozca chile.?',113456723);

insert into carrera_asignaturas(id,codigo_carrera,codigo_asignatura) values
(DEFAULT,999997,999987),
(DEFAULT,929997,999999);

insert into certificado_alumno(id,folio_certificado,rut_alumno) values
(DEFAULT,999996,194653946);

insert into seccion_alumno(codigo,rut_alumno,codigo_seccion,promedio,nota_p1,nota_p2,nota_p3,nota_c1,nota_c2,nota_c3,aprobado,estado_cursado) values
(DEFAULT,194653946,999995,5.0,5.0,5.0,5.0,5.0,5.0,5.0,1,'n');

insert into seccion_sala(id,codigo_seccion,codigo_sala,bloque) values 
(DEFAULT,999995,999990,'L2');

insert into solicitud_alumno(id,codigo_solicitud,rut_alumno) values
(DEFAULT,999994,194653946);

insert into mensaje_alumno(codigo,codigo_mensaje,rut_alumno) values 
(DEFAULT,999991,194653946),
(DEFAULT,999978,194653946);

insert into mensualidad(codigo,codigo_pago,numero_mensualidad,costo) values
(DEFAULT,999989,1,450000);