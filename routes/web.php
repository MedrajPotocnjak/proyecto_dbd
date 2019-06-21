<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Rutas Administrador
Route::get('/Administrador','AdministradorController@index');
Route::post('/Administrador','AdministradorController@store');
//Route::get();SHOW
Route::put('/Administrador/{id}','AdministradorController@update');
Route::delete('/Administrador/{id}','AdministradorController@destroy');

//Rutas Alumno
Route::get('/Alumno','AlumnoController@index');
Route::post('/Alumno','AlumnoController@store');
//Route::get();SHOW
Route::get('/Alumno/getMensaje/{id}','AlumnoController@getMensaje');
Route::post('/Alumno/createMensaje/{id}','AlumnoController@createMensaje');
Route::put('/Alumno/{id}','AlumnoController@update');
Route::delete('/Alumno/{id}','AlumnoController@destroy');

//Rutas Asignatura
Route::get('/Asignatura','AsignaturaController@index');
Route::post('/Asignatura','AsignaturaController@store');
//Route::get();SHOW
Route::get('/Asignatura/getHorarios/{id}','AsignaturaController@getHorarios');
Route::put('/Asignatura/{id}','AsignaturaController@update');
Route::delete('/Asignatura/{id}','AsignaturaController@destroy');

//Rutas Carrera
Route::get('/Carrera','CarreraController@index');
Route::post('/Carrera','CarreraController@store');
//Route::get();SHOW
Route::put('/Carrera/{id}','CarreraController@update');
Route::delete('/Carrera/{id}','CarreraController@destroy');

//Rutas Certificado
Route::get('/Certificado','CertificadoController@index');
Route::post('/Certificado','CertificadoController@store');
//Route::get();SHOW
Route::put('/Certificado/{id}','CertificadoController@update');
Route::delete('/Certificado/{id}','CertificadoController@destroy');

//Rutas CoordinadorDocente
Route::get('/CoordinadorDocente','CoordinadorDocenteController@index');
Route::post('/CoordinadorDocente','CoordinadorDocenteController@store');
//Route::get();SHOW
Route::put('/CoordinadorDocente/{id}','CoordinadorDocenteController@update');
Route::delete('/CoordinadorDocente/{id}','CoordinadorDocenteController@destroy');

//Rutas Departamento
Route::get('/Departamento','DepartamentoController@index');
Route::post('/Departamento','DepartamentoController@store');
//Route::get();SHOW
Route::put('/Departamento/{id}','DepartamentoController@update');
Route::delete('/Departamento/{id}','DepartamentoController@destroy');

//Rutas Estudio
Route::get('/Estudio','EstudioController@index');
Route::post('/Estudio','EstudioController@store');
//Route::get();SHOW
Route::put('/Estudio/{id}','EstudioController@update');
Route::delete('/Estudio/{id}','EstudioController@destroy');

//Rutas Matricula
Route::get('/Matricula','MatriculaController@index');
Route::post('/Matricula','MatriculaController@store');
//Route::get();SHOW
Route::put('/Matricula/{id}','MatriculaController@update');
Route::delete('/Matricula/{id}','MatriculaController@destroy');

//Rutas Mensaje
Route::get('/Mensaje','MensajeController@index');
Route::post('/Mensaje','MensajeController@store');
//Route::get();SHOW
Route::put('/Mensaje/{id}','MensajeController@update');
Route::delete('/Mensaje/{id}','MensajeController@destroy');

//Rutas Mensualidad
Route::get('/Mensualidad','MensualidadController@index');
Route::post('/Mensualidad','MensualidadController@store');
//Route::get();SHOW
Route::put('/Mensualidad/{id}','MensualidadController@update');
Route::delete('/Mensualidad/{id}','MensualidadController@destroy');

//Rutas Pago
Route::get('/Pago','PagoController@index');
Route::post('/Pago','PagoController@store');
//Route::get();SHOW
Route::get('/Pago/statusMatricula/{id}','PagoController@statusMatricula');
Route::get('/Pago/getPagos/{id}','PagoController@getPagos');
Route::post('/Pago/addPago/{id}','PagoController@addPago');
Route::put('/Pago/{id}','PagoController@update');
Route::delete('/Pago/{id}','PagoController@destroy');

//Rutas Profesor
Route::get('/Profesor','ProfesorController@index');
Route::get('/Profesor/verMensajes/{id}','ProfesorController@verMensajes');
Route::post('/Profesor','ProfesorController@store');
//Route::get();SHOW
Route::put('/Profesor/{id}','ProfesorController@update');
Route::delete('/Profesor/{id}','ProfesorController@destroy');

//Rutas Sala
Route::get('/Sala','SalaController@index');
Route::post('/Sala','SalaController@store');
//Route::get();SHOW
Route::put('/Sala/{id}','SalaController@update');
Route::delete('/Sala/{id}','SalaController@destroy');

//Rutas Seccion
Route::get('/Seccion','SeccionController@index');
Route::get('/Seccion/getHorarios/{id}','SeccionController@getHorarios');
Route::post('/Seccion/addHorario/{id}','SeccionController@addHorario');
Route::post('/Seccion','SeccionController@store');
//Route::get();SHOW
Route::put('/Seccion/{id}','SeccionController@update');
Route::delete('/Seccion/{id}','SeccionController@destroy');

//Rutas Solicitud
Route::get('/Solicitud','SolicitudController@index');
Route::post('/Solicitud','SolicitudController@store');
//Route::get();SHOW
Route::put('/Solicitud/{id}','SolicitudController@update');
Route::delete('/Solicitud/{id}','SolicitudController@destroy');

//Rutas Carrera_Asignatura
Route::get('/Carrera_Asignatura','CarreraAsignaturaController@index');
Route::post('/Carrera_Asignatura','CarreraAsignaturaController@store');
//Route::get();SHOW
Route::put('/Carrera_Asignatura/{id}','CarreraAsignaturaController@update');
Route::delete('/Carrera_Asignatura/{id}','CarreraAsignaturaController@destroy');

//Rutas Certificado_Alumno
Route::get('/Certificado_Alumno','CertificadoAlumnoController@index');
Route::post('/Certificado_Alumno','CertificadoAlumnoController@store');
//Route::get();SHOW
Route::put('/Certificado_Alumno/{id}','CertificadoAlumnoController@update');
Route::delete('/Certificado_Alumno/{id}','CertificadoAlumnoController@destroy');

//Rutas Mensaje_Alumno
Route::get('/Mensaje_Alumno','MensajeAlumnoController@index');
Route::post('/Mensaje_Alumno','MensajeAlumnoController@store');
//Route::get();SHOW
Route::put('/Mensaje_Alumno/{id}','MensajeAlumnoController@update');
Route::delete('/Mensaje_Alumno/{id}','MensajeAlumnoController@destroy');

//Rutas Seccion_Alumno
Route::get('/Seccion_Alumno','AlumnoSeccionController@index');
Route::post('/Seccion_Alumno','AlumnoSeccionController@store');
//Route::get();SHOW
Route::put('/Seccion_Alumno/{id}','AlumnoSeccionController@update');
Route::delete('/Seccion_Alumno/{id}','AlumnoSeccionController@destroy');

//Rutas Seccion_Sala
Route::get('/Seccion_Sala','SeccionSalaController@index');
Route::post('/Seccion_Sala','SeccionSalaController@store');
//Route::get();SHOW
Route::put('/Seccion_Sala/{id}','SeccionSalaController@update');
Route::delete('/Seccion_Sala/{id}','SeccionSalaController@destroy');

//Rutas Solicitud_Alumno
Route::get('/Solicitud_Alumno','SolicitudAlumnoController@index');
Route::post('/Solicitud_Alumno','SolicitudAlumnoController@store');
//Route::get();SHOW
Route::put('/Solicitud_Alumno/{id}','SolicitudAlumnoController@update');
Route::delete('/Solicitud_Alumno/{id}','SolicitudAlumnoController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
