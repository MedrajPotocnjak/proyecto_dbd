
create table administrador (
	id serial,
	rut integer UNIQUE,
	nombre varchar(30),
	apellido_paterno varchar(15),
	apellido_materno varchar(15),
	password varchar(14),
	created_at timestamp default current_timestamp,
	updated_at timestamp default current_timestamp,
	primary key(id)
);

create table alumno (
	id serial,
	rut integer UNIQUE,
	nombre varchar(30),
	apellido_paterno varchar(15),
	apellido_materno varchar(15),
	nivel integer,
	ingreso varchar(6),
	password varchar(14),
	asignaturas_aprobadas integer,
	nas float,
	ppa float,
	nar float,
	fecha_nacimiento date,
	nacionalidad varchar(20),
	estado_civil varchar(12),
	sexo char,
	telefono varchar(12),
	region varchar(30),
	provincia varchar(30),
	comuna varchar(30),
	correo varchar(40),
	created_at timestamp default current_timestamp,
	updated_at timestamp default current_timestamp,
	primary key(id)
);

create table asignatura (
	codigo serial,
	nombre varchar(60),
	jornada varchar(10),
	asistencia_minima integer,
	ponderacion varchar(5),
	nivel integer,
	horas_teoria integer,
	horas_laboratorio integer,
	horas_ejercicios integer,
	version_plan_estudios varchar(6),
	created_at timestamp default current_timestamp,
	updated_at timestamp default current_timestamp,
	primary key(codigo)
);

create table coordinador_docente (
	id serial,
	rut integer UNIQUE,
	nombres varchar(30),
	apellido_paterno varchar(15),
	apellido_materno varchar(15),
	password varchar(14),
	created_at timestamp default current_timestamp,
	updated_at timestamp default current_timestamp,
	primary key(id)
);

create table departamento (
	codigo serial,
	nombre varchar(60),
	rut_coordinador integer,
	foreign key(rut_coordinador)
	references coordinador_docente(rut),
	created_at timestamp default current_timestamp,
	updated_at timestamp default current_timestamp,
	primary key(codigo)
);

create table carrera (
	codigo serial,
	nombre varchar(60),
	asignaturas_plan smallint,
	cantidad_alumnos smallint,
	arancel integer,
	codigo_departamento integer,
	foreign key(codigo_departamento)
	references departamento(codigo),
	created_at timestamp default current_timestamp,
	updated_at timestamp default current_timestamp,
	primary key(codigo)
);

create table carrera_asignaturas (
	id serial,
	codigo_carrera integer,
	codigo_asignatura integer,
	foreign key(codigo_carrera)
	references carrera(codigo),
	foreign key(codigo_asignatura)
	references asignatura(codigo),
	created_at timestamp default current_timestamp,
	updated_at timestamp default current_timestamp,
	primary key(id)
);

create table certificado (
	folio serial,
	codigo_verificacion varchar(32),
	contenido text,
	fecha date,
	ruta varchar(45),
	created_at timestamp default current_timestamp,
	updated_at timestamp default current_timestamp,
	primary key(folio)
);

create table certificado_alumno (
	id serial,
	folio_certificado integer,
	rut_alumno integer,
	foreign key(rut_alumno)
	references alumno(rut),
	foreign key(folio_certificado)
	references certificado(folio),
	created_at timestamp default current_timestamp,
	updated_at timestamp default current_timestamp,
	primary key(id)
);

create table estudio (
	codigo serial,
	codigo_departamento integer,
	foreign key(codigo_departamento)
	references departamento(codigo),
	area varchar(32),
	titulo varchar(32),
	contenido text,
	ruta_estudio varchar(45),
	created_at timestamp default current_timestamp,
	updated_at timestamp default current_timestamp,
	primary key(codigo)
);

create table pago(
	codigo serial,
	rut_alumno integer,
	tipo_pago varchar(1),
	forma_pago integer,
	foreign key(rut_alumno)
	references alumno(rut),
	created_at timestamp default current_timestamp,
	updated_at timestamp default current_timestamp,
	primary key (codigo)
);


create table matricula (
	codigo serial,
	codigo_pago integer,
	estado_matricula varchar(20),
	costo integer,
	created_at timestamp default current_timestamp,
	updated_at timestamp default current_timestamp,
	foreign key(codigo_pago)
	references pago(codigo),
	primary key(codigo)
);

create table seccion(
	codigo serial,
	rut_profesor integer,
	codigo_asignatura integer,
	nombre varchar(60),
	cupos integer,
	tipo varchar(1)
	created_at timestamp default current_timestamp,
	updated_at timestamp default current_timestamp,
	foreign key(rut_profesor)
	references profesor(rut),
	foreign key(codigo_asignatura)
	references asignatura(codigo),
	primary key (codigo)
);

create table seccion_alumno(
	codigo serial,
	rut_alumno integer,
	codigo_seccion varchar(20),
	aprobado integer,
	promedio float,
	nota_p1 float,
	nota_p2 float,
	nota_p3 float,
	nota_c1 float,
	nota_c2 float,
	nota_c3 float,
	estado_cursado varchar(1),
	created_at timestamp default current_timestamp,
	updated_at timestamp default current_timestamp,
	foreign key(rut_alumno)
	references alumno(rut),
	foreign key(codigo_seccion)
	references seccion(codigo),
	primary key(codigo)
);

create table mensualidad(
	codigo serial,
	codigo_pago integer,
	numero_mensualidad integer,
	costo integer,
	created_at timestamp default current_timestamp,
	updated_at timestamp default current_timestamp,
	foreign key(codigo_pago)
	references pago(codigo),
	primary key(codigo)
);

create table mensaje(
	id serial,
	asunto varchar(128),
	contenido text,
	created_at timestamp default current_timestamp,
	updated_at timestamp default current_timestamp,
	primary key(id)
);

create table solicitud(
	codigo serial,
	contenido text,
	ruta_formato varchar(50),
	created_at timestamp default current_timestamp,
	updated_at timestamp default current_timestamp,
	primary key(codigo)
);

create table solicitud_alumno(
	id serial,
	rut_alumno integer,
	codigo_solicitud integer,
	created_at timestamp default current_timestamp,
	updated_at timestamp default current_timestamp,
	foreign key(rut_alumno)
	references alumno(rut),
	foreign key(codigo_solicitud)
	references solicitud(codigo),
	primary key(id)
);
