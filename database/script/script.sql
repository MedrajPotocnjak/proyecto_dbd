CREATE TABLE public.administrador (
    id bigint NOT NULL,
    rut integer NOT NULL,
    password character varying(14) NOT NULL,
    nombres character varying(30) NOT NULL,
    apellido_paterno character varying(15) NOT NULL,
    apellido_materno character varying(15) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.administrador OWNER TO homestead;

CREATE SEQUENCE public.administrador_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.administrador_id_seq OWNER TO homestead;


ALTER SEQUENCE public.administrador_id_seq OWNED BY public.administrador.id;


CREATE TABLE public.alumno (
    id bigint NOT NULL,
    rut integer NOT NULL,
    nombre character varying(30) NOT NULL,
    apellido_paterno character varying(15) NOT NULL,
    apellido_materno character varying(15) NOT NULL,
    nivel integer NOT NULL,
    ingreso character varying(5) NOT NULL,
    password character varying(14) NOT NULL,
    asignaturas_aprobadas integer NOT NULL,
    nas double precision NOT NULL,
    ppa double precision NOT NULL,
    nar double precision NOT NULL,
    fecha_nacimiento timestamp(0) without time zone NOT NULL,
    nacionalidad character varying(20) NOT NULL,
    estado_civil character varying(12) NOT NULL,
    sexo character(255) NOT NULL,
    telefono character varying(12) NOT NULL,
    region character varying(30) NOT NULL,
    provincia character varying(30) NOT NULL,
    comuna character varying(30) NOT NULL,
    correo character varying(40) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.alumno OWNER TO homestead;

CREATE SEQUENCE public.alumno_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.alumno_id_seq OWNER TO homestead;

--
-- Name: alumno_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: homestead
--

ALTER SEQUENCE public.alumno_id_seq OWNED BY public.alumno.id;

CREATE TABLE public.asignatura (
    codigo bigint NOT NULL,
    nombre character varying(60) NOT NULL,
    jornada character varying(10) NOT NULL,
    asistencia_minima integer NOT NULL,
    ponderacion character varying(5) NOT NULL,
    nivel integer NOT NULL,
    horas_teoria integer NOT NULL,
    horas_laboratorio integer NOT NULL,
    horas_ejercicios integer NOT NULL,
    version_plan_estudios character varying(6) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.asignatura OWNER TO homestead;


CREATE SEQUENCE public.asignatura_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.asignatura_codigo_seq OWNER TO homestead;

ALTER SEQUENCE public.asignatura_codigo_seq OWNED BY public.asignatura.codigo;


CREATE TABLE public.carrera (
    codigo bigint NOT NULL,
    codigo_departamento integer NOT NULL,
    nombre character varying(60) NOT NULL,
    asignaturas_plan smallint NOT NULL,
    cantidad_alumnos smallint NOT NULL,
    arancel integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.carrera OWNER TO homestead;

CREATE TABLE public.carrera_asignaturas (
    id bigint NOT NULL,
    codigo_carrera integer NOT NULL,
    codigo_asignatura integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.carrera_asignaturas OWNER TO homestead;

CREATE SEQUENCE public.carrera_asignaturas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.carrera_asignaturas_id_seq OWNER TO homestead;

ALTER SEQUENCE public.carrera_asignaturas_id_seq OWNED BY public.carrera_asignaturas.id;


CREATE SEQUENCE public.carrera_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.carrera_codigo_seq OWNER TO homestead;

ALTER SEQUENCE public.carrera_codigo_seq OWNED BY public.carrera.codigo;

CREATE TABLE public.certificado (
    folio bigint NOT NULL,
    codigo_verificacion character varying(32) NOT NULL,
    contenido text NOT NULL,
    fecha timestamp(0) without time zone NOT NULL,
    ruta_formato character varying(4) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.certificado OWNER TO homestead;

CREATE TABLE public.certificado_alumno (
    id bigint NOT NULL,
    folio_certificado integer NOT NULL,
    rut_alumno integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.certificado_alumno OWNER TO homestead;

CREATE SEQUENCE public.certificado_alumno_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.certificado_alumno_id_seq OWNER TO homestead;

ALTER SEQUENCE public.certificado_alumno_id_seq OWNED BY public.certificado_alumno.id;

CREATE SEQUENCE public.certificado_folio_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.certificado_folio_seq OWNER TO homestead;

ALTER SEQUENCE public.certificado_folio_seq OWNED BY public.certificado.folio;

CREATE TABLE public.coordinador_docente (
    id bigint NOT NULL,
    rut integer NOT NULL,
    password character varying(14) NOT NULL,
    nombres character varying(30) NOT NULL,
    apellido_paterno character varying(15) NOT NULL,
    apellido_materno character varying(15) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.coordinador_docente OWNER TO homestead;

CREATE SEQUENCE public.coordinador_docente_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.coordinador_docente_id_seq OWNER TO homestead;

ALTER SEQUENCE public.coordinador_docente_id_seq OWNED BY public.coordinador_docente.id;

CREATE TABLE public.departamento (
    codigo bigint NOT NULL,
    rut_coordinador integer NOT NULL,
    nombre character varying(60) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.departamento OWNER TO homestead;

CREATE SEQUENCE public.departamento_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.departamento_codigo_seq OWNER TO homestead;

ALTER SEQUENCE public.departamento_codigo_seq OWNED BY public.departamento.codigo;


CREATE TABLE public.estudio (
    codigo bigint NOT NULL,
    codigo_departamento integer NOT NULL,
    area character varying(32) NOT NULL,
    titulo character varying(32) NOT NULL,
    contenido character varying(255) NOT NULL,
    ruta_estudio character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.estudio OWNER TO homestead;

CREATE SEQUENCE public.estudio_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estudio_codigo_seq OWNER TO homestead;

ALTER SEQUENCE public.estudio_codigo_seq OWNED BY public.estudio.codigo;

CREATE TABLE public.matricula (
    codigo bigint NOT NULL,
    codigo_pago integer NOT NULL,
    estado_matricula character varying(20) NOT NULL,
    costo integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.matricula OWNER TO homestead;

CREATE SEQUENCE public.matricula_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.matricula_codigo_seq OWNER TO homestead;


ALTER SEQUENCE public.matricula_codigo_seq OWNED BY public.matricula.codigo;

CREATE TABLE public.mensaje (
    id bigint NOT NULL,
    asunto character varying(128) NOT NULL,
    contenido text NOT NULL,
    fecha timestamp(0) without time zone NOT NULL,
    rut_profesor integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.mensaje OWNER TO homestead;


CREATE TABLE public.mensaje_alumno (
    codigo bigint NOT NULL,
    codigo_mensaje integer NOT NULL,
    rut_alumno integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.mensaje_alumno OWNER TO homestead;

CREATE SEQUENCE public.mensaje_alumno_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.mensaje_alumno_codigo_seq OWNER TO homestead;

ALTER SEQUENCE public.mensaje_alumno_codigo_seq OWNED BY public.mensaje_alumno.codigo;

CREATE SEQUENCE public.mensaje_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.mensaje_id_seq OWNER TO homestead;

ALTER SEQUENCE public.mensaje_id_seq OWNED BY public.mensaje.id;

CREATE TABLE public.mensualidad (
    codigo bigint NOT NULL,
    codigo_pago integer NOT NULL,
    numero_mensualidad integer NOT NULL,
    costo integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.mensualidad OWNER TO homestead;

CREATE SEQUENCE public.mensualidad_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.mensualidad_codigo_seq OWNER TO homestead;

ALTER SEQUENCE public.mensualidad_codigo_seq OWNED BY public.mensualidad.codigo;


CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);

ALTER TABLE public.migrations OWNER TO homestead;

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO homestead;

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;

CREATE TABLE public.pago (
    codigo bigint NOT NULL,
    rut_alumno integer NOT NULL,
    tipo_pago character varying(1) NOT NULL,
    forma_pago integer NOT NULL,
    fecha_pago timestamp(0) without time zone NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.pago OWNER TO homestead;

CREATE SEQUENCE public.pago_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pago_codigo_seq OWNER TO homestead;

ALTER SEQUENCE public.pago_codigo_seq OWNED BY public.pago.codigo;

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO homestead;

CREATE TABLE public.profesor (
    id bigint NOT NULL,
    rut integer NOT NULL,
    nombres character varying(30) NOT NULL,
    apellido_paterno character varying(15) NOT NULL,
    apellido_materno character varying(15) NOT NULL,
    password character varying(14) NOT NULL,
    area character varying(30) NOT NULL,
    fecha_nacimiento timestamp(0) without time zone NOT NULL,
    nacionalidad character varying(20) NOT NULL,
    sexo character(255) NOT NULL,
    telefono character varying(12) NOT NULL,
    region character varying(30) NOT NULL,
    provincia character varying(30) NOT NULL,
    comuna character varying(30) NOT NULL,
    correo character varying(40) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.profesor OWNER TO homestead;

CREATE SEQUENCE public.profesor_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.profesor_id_seq OWNER TO homestead;

ALTER SEQUENCE public.profesor_id_seq OWNED BY public.profesor.id;

CREATE TABLE public.sala (
    codigo bigint NOT NULL,
    nombre character varying(15) NOT NULL,
    ubicacion character varying(10) NOT NULL,
    cantidad_puestos smallint NOT NULL,
    cantidad_computadores smallint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.sala OWNER TO homestead;

CREATE SEQUENCE public.sala_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sala_codigo_seq OWNER TO homestead;

ALTER SEQUENCE public.sala_codigo_seq OWNED BY public.sala.codigo;

CREATE TABLE public.seccion (
    codigo bigint NOT NULL,
    rut_profesor integer NOT NULL,
    codigo_asignatura integer NOT NULL,
    nombre character varying(60) NOT NULL,
    cupos integer NOT NULL,
    tipo character(1) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);

ALTER TABLE public.seccion OWNER TO homestead;

CREATE TABLE public.seccion_alumno (
    codigo bigint NOT NULL,
    rut_alumno integer NOT NULL,
    codigo_seccion integer NOT NULL,
    aprobado smallint NOT NULL,
    promedio double precision NOT NULL,
    nota_p1 double precision NOT NULL,
    nota_p2 double precision NOT NULL,
    nota_p3 double precision NOT NULL,
    nota_c1 double precision NOT NULL,
    nota_c2 double precision NOT NULL,
    nota_c3 double precision NOT NULL,
    estado_cursado character(1) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.seccion_alumno OWNER TO homestead;

CREATE SEQUENCE public.seccion_alumno_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.seccion_alumno_codigo_seq OWNER TO homestead;

ALTER SEQUENCE public.seccion_alumno_codigo_seq OWNED BY public.seccion_alumno.codigo;

CREATE SEQUENCE public.seccion_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.seccion_codigo_seq OWNER TO homestead;

ALTER SEQUENCE public.seccion_codigo_seq OWNED BY public.seccion.codigo;

CREATE TABLE public.seccion_sala (
    id bigint NOT NULL,
    codigo_seccion integer NOT NULL,
    codigo_sala integer NOT NULL,
    bloque character varying(2) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.seccion_sala OWNER TO homestead;

CREATE SEQUENCE public.seccion_sala_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER TABLE public.seccion_sala_id_seq OWNER TO homestead;

ALTER SEQUENCE public.seccion_sala_id_seq OWNED BY public.seccion_sala.id;

CREATE TABLE public.solicitud (
    codigo bigint NOT NULL,
    fecha timestamp(0) without time zone NOT NULL,
    contenido text NOT NULL,
    ruta_formato character varying(4) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.solicitud OWNER TO homestead;

CREATE TABLE public.solicitud_alumno (
    id bigint NOT NULL,
    rut_alumno integer NOT NULL,
    codigo_solicitud integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.solicitud_alumno OWNER TO homestead;

CREATE SEQUENCE public.solicitud_alumno_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.solicitud_alumno_id_seq OWNER TO homestead;

ALTER SEQUENCE public.solicitud_alumno_id_seq OWNED BY public.solicitud_alumno.id;

CREATE SEQUENCE public.solicitud_codigo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.solicitud_codigo_seq OWNER TO homestead;

ALTER SEQUENCE public.solicitud_codigo_seq OWNED BY public.solicitud.codigo;

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO homestead;

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO homestead;

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;

ALTER TABLE ONLY public.administrador ALTER COLUMN id SET DEFAULT nextval('public.administrador_id_seq'::regclass);

ALTER TABLE ONLY public.alumno ALTER COLUMN id SET DEFAULT nextval('public.alumno_id_seq'::regclass);

ALTER TABLE ONLY public.asignatura ALTER COLUMN codigo SET DEFAULT nextval('public.asignatura_codigo_seq'::regclass);

ALTER TABLE ONLY public.carrera ALTER COLUMN codigo SET DEFAULT nextval('public.carrera_codigo_seq'::regclass);

ALTER TABLE ONLY public.carrera_asignaturas ALTER COLUMN id SET DEFAULT nextval('public.carrera_asignaturas_id_seq'::regclass);

ALTER TABLE ONLY public.certificado ALTER COLUMN folio SET DEFAULT nextval('public.certificado_folio_seq'::regclass);

ALTER TABLE ONLY public.certificado_alumno ALTER COLUMN id SET DEFAULT nextval('public.certificado_alumno_id_seq'::regclass);

ALTER TABLE ONLY public.coordinador_docente ALTER COLUMN id SET DEFAULT nextval('public.coordinador_docente_id_seq'::regclass);

ALTER TABLE ONLY public.departamento ALTER COLUMN codigo SET DEFAULT nextval('public.departamento_codigo_seq'::regclass);

ALTER TABLE ONLY public.estudio ALTER COLUMN codigo SET DEFAULT nextval('public.estudio_codigo_seq'::regclass);

ALTER TABLE ONLY public.matricula ALTER COLUMN codigo SET DEFAULT nextval('public.matricula_codigo_seq'::regclass);

ALTER TABLE ONLY public.mensaje ALTER COLUMN id SET DEFAULT nextval('public.mensaje_id_seq'::regclass);

ALTER TABLE ONLY public.mensaje_alumno ALTER COLUMN codigo SET DEFAULT nextval('public.mensaje_alumno_codigo_seq'::regclass);

ALTER TABLE ONLY public.mensualidad ALTER COLUMN codigo SET DEFAULT nextval('public.mensualidad_codigo_seq'::regclass);

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);

ALTER TABLE ONLY public.pago ALTER COLUMN codigo SET DEFAULT nextval('public.pago_codigo_seq'::regclass);

ALTER TABLE ONLY public.profesor ALTER COLUMN id SET DEFAULT nextval('public.profesor_id_seq'::regclass);

ALTER TABLE ONLY public.sala ALTER COLUMN codigo SET DEFAULT nextval('public.sala_codigo_seq'::regclass);

ALTER TABLE ONLY public.seccion ALTER COLUMN codigo SET DEFAULT nextval('public.seccion_codigo_seq'::regclass);

ALTER TABLE ONLY public.seccion_alumno ALTER COLUMN codigo SET DEFAULT nextval('public.seccion_alumno_codigo_seq'::regclass);

ALTER TABLE ONLY public.seccion_sala ALTER COLUMN id SET DEFAULT nextval('public.seccion_sala_id_seq'::regclass);

ALTER TABLE ONLY public.solicitud ALTER COLUMN codigo SET DEFAULT nextval('public.solicitud_codigo_seq'::regclass);

ALTER TABLE ONLY public.solicitud_alumno ALTER COLUMN id SET DEFAULT nextval('public.solicitud_alumno_id_seq'::regclass);

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);

ALTER TABLE ONLY public.administrador
    ADD CONSTRAINT administrador_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.administrador
    ADD CONSTRAINT administrador_rut_unique UNIQUE (rut);

ALTER TABLE ONLY public.alumno
    ADD CONSTRAINT alumno_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.alumno
    ADD CONSTRAINT alumno_rut_unique UNIQUE (rut);

ALTER TABLE ONLY public.asignatura
    ADD CONSTRAINT asignatura_pkey PRIMARY KEY (codigo);

ALTER TABLE ONLY public.carrera_asignaturas
    ADD CONSTRAINT carrera_asignaturas_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.carrera
    ADD CONSTRAINT carrera_pkey PRIMARY KEY (codigo);

ALTER TABLE ONLY public.certificado_alumno
    ADD CONSTRAINT certificado_alumno_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.certificado
    ADD CONSTRAINT certificado_pkey PRIMARY KEY (folio);

ALTER TABLE ONLY public.coordinador_docente
    ADD CONSTRAINT coordinador_docente_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.coordinador_docente
    ADD CONSTRAINT coordinador_docente_rut_unique UNIQUE (rut);

ALTER TABLE ONLY public.departamento
    ADD CONSTRAINT departamento_pkey PRIMARY KEY (codigo);

ALTER TABLE ONLY public.estudio
    ADD CONSTRAINT estudio_pkey PRIMARY KEY (codigo);

ALTER TABLE ONLY public.matricula
    ADD CONSTRAINT matricula_pkey PRIMARY KEY (codigo);

ALTER TABLE ONLY public.mensaje_alumno
    ADD CONSTRAINT mensaje_alumno_pkey PRIMARY KEY (codigo);

ALTER TABLE ONLY public.mensaje
    ADD CONSTRAINT mensaje_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.mensualidad
    ADD CONSTRAINT mensualidad_pkey PRIMARY KEY (codigo);

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.pago
    ADD CONSTRAINT pago_pkey PRIMARY KEY (codigo);

ALTER TABLE ONLY public.profesor
    ADD CONSTRAINT profesor_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.profesor
    ADD CONSTRAINT profesor_rut_unique UNIQUE (rut);

ALTER TABLE ONLY public.sala
    ADD CONSTRAINT sala_pkey PRIMARY KEY (codigo);

ALTER TABLE ONLY public.seccion_alumno
    ADD CONSTRAINT seccion_alumno_pkey PRIMARY KEY (codigo);

ALTER TABLE ONLY public.seccion
    ADD CONSTRAINT seccion_pkey PRIMARY KEY (codigo);

ALTER TABLE ONLY public.seccion_sala
    ADD CONSTRAINT seccion_sala_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.solicitud_alumno
    ADD CONSTRAINT solicitud_alumno_pkey PRIMARY KEY (id);

ALTER TABLE ONLY public.solicitud
    ADD CONSTRAINT solicitud_pkey PRIMARY KEY (codigo);

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);

ALTER TABLE ONLY public.carrera_asignaturas
    ADD CONSTRAINT carrera_asignaturas_codigo_asignatura_foreign FOREIGN KEY (codigo_asignatura) REFERENCES public.asignatura(codigo) ON DELETE CASCADE;

ALTER TABLE ONLY public.carrera_asignaturas
    ADD CONSTRAINT carrera_asignaturas_codigo_carrera_foreign FOREIGN KEY (codigo_carrera) REFERENCES public.carrera(codigo) ON DELETE CASCADE;

ALTER TABLE ONLY public.carrera
    ADD CONSTRAINT carrera_codigo_departamento_foreign FOREIGN KEY (codigo_departamento) REFERENCES public.departamento(codigo) ON DELETE CASCADE;

ALTER TABLE ONLY public.certificado_alumno
    ADD CONSTRAINT certificado_alumno_folio_certificado_foreign FOREIGN KEY (folio_certificado) REFERENCES public.certificado(folio) ON DELETE CASCADE;

ALTER TABLE ONLY public.certificado_alumno
    ADD CONSTRAINT certificado_alumno_rut_alumno_foreign FOREIGN KEY (rut_alumno) REFERENCES public.alumno(rut) ON DELETE CASCADE;

ALTER TABLE ONLY public.departamento
    ADD CONSTRAINT departamento_rut_coordinador_foreign FOREIGN KEY (rut_coordinador) REFERENCES public.coordinador_docente(rut);

ALTER TABLE ONLY public.estudio
    ADD CONSTRAINT estudio_codigo_departamento_foreign FOREIGN KEY (codigo_departamento) REFERENCES public.departamento(codigo) ON DELETE CASCADE;

ALTER TABLE ONLY public.matricula
    ADD CONSTRAINT matricula_codigo_pago_foreign FOREIGN KEY (codigo_pago) REFERENCES public.pago(codigo) ON DELETE CASCADE;

ALTER TABLE ONLY public.mensaje_alumno
    ADD CONSTRAINT mensaje_alumno_codigo_mensaje_foreign FOREIGN KEY (codigo_mensaje) REFERENCES public.mensaje(id) ON DELETE CASCADE;

ALTER TABLE ONLY public.mensaje_alumno
    ADD CONSTRAINT mensaje_alumno_rut_alumno_foreign FOREIGN KEY (rut_alumno) REFERENCES public.alumno(rut) ON DELETE CASCADE;

ALTER TABLE ONLY public.mensaje
    ADD CONSTRAINT mensaje_rut_profesor_foreign FOREIGN KEY (rut_profesor) REFERENCES public.profesor(rut) ON DELETE CASCADE;

ALTER TABLE ONLY public.mensualidad
    ADD CONSTRAINT mensualidad_codigo_pago_foreign FOREIGN KEY (codigo_pago) REFERENCES public.pago(codigo) ON DELETE CASCADE;

ALTER TABLE ONLY public.pago
    ADD CONSTRAINT pago_rut_alumno_foreign FOREIGN KEY (rut_alumno) REFERENCES public.alumno(rut) ON DELETE CASCADE;

ALTER TABLE ONLY public.seccion_alumno
    ADD CONSTRAINT seccion_alumno_codigo_seccion_foreign FOREIGN KEY (codigo_seccion) REFERENCES public.seccion(codigo) ON DELETE CASCADE;

ALTER TABLE ONLY public.seccion_alumno
    ADD CONSTRAINT seccion_alumno_rut_alumno_foreign FOREIGN KEY (rut_alumno) REFERENCES public.alumno(rut) ON DELETE CASCADE;

ALTER TABLE ONLY public.seccion
    ADD CONSTRAINT seccion_codigo_asignatura_foreign FOREIGN KEY (codigo_asignatura) REFERENCES public.asignatura(codigo) ON DELETE CASCADE;

ALTER TABLE ONLY public.seccion
    ADD CONSTRAINT seccion_rut_profesor_foreign FOREIGN KEY (rut_profesor) REFERENCES public.profesor(rut);

ALTER TABLE ONLY public.seccion_sala
    ADD CONSTRAINT seccion_sala_codigo_sala_foreign FOREIGN KEY (codigo_sala) REFERENCES public.sala(codigo) ON DELETE CASCADE;

ALTER TABLE ONLY public.seccion_sala
    ADD CONSTRAINT seccion_sala_codigo_seccion_foreign FOREIGN KEY (codigo_seccion) REFERENCES public.seccion(codigo) ON DELETE CASCADE;

ALTER TABLE ONLY public.solicitud_alumno
    ADD CONSTRAINT solicitud_alumno_codigo_solicitud_foreign FOREIGN KEY (codigo_solicitud) REFERENCES public.solicitud(codigo) ON DELETE CASCADE;

ALTER TABLE ONLY public.solicitud_alumno
    ADD CONSTRAINT solicitud_alumno_rut_alumno_foreign FOREIGN KEY (rut_alumno) REFERENCES public.alumno(rut) ON DELETE CASCADE;
