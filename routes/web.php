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



//Rutas Administrador
Route::get('/Administrador','AdministradorController@index');
Route::get('/Administrador/{id}','AdministradorController@show');
Route::post('/Administrador','AdministradorController@store');
//Route::get();SHOW
Route::put('/Administrador/{id}','AdministradorController@update');
Route::delete('/Administrador/{id}','AdministradorController@destroy');

//Rutas Alumno
Route::get('/Alumno','AlumnoController@index');
Route::post('/Alumno','AlumnoController@store');
//Route::get();SHOW
Route::get('/Alumno/getSecciones/{id}','AlumnoController@getSecciones');
Route::get('/Alumno/getPosibleAsignatura/{id}','AlumnoController@getPosibleAsignatura');
Route::get('/Alumno/getPosibleAsignatura2/{id}','AlumnoController@getPosibleAsignatura2');
Route::get('/Alumno/getMensaje/{id}','AlumnoController@getMensaje');
Route::get('/Alumno/getSolicitud/{id}','AlumnoController@getSolicitud');
Route::get('/Alumno/getCertificados/{id}','AlumnoController@getCertificados');
Route::get('/Alumno/obtenerHorario/{id}','AlumnoController@obtenerHorario');
Route::get('/Alumno/obtenerSemestre/{id}','AlumnoController@obtenerSemestre');
Route::get('/Alumno/obtenerDataSeccion/{id}','AlumnoController@obtenerDataSeccion');
Route::get('/Alumno/verHorario/{id}','AlumnoController@verHorario');
Route::get('/Alumno/getSeccionesCursando/{id}','AlumnoController@getSeccionesCursando');
Route::post('/Alumno/inscribirAsignatura/{id}','AlumnoController@inscribirAsignatura');
Route::post('/Alumno/createMensaje/{id}','AlumnoController@createMensaje');
Route::post('/Alumno/createCertificado/{id}','AlumnoController@createCertificado');
Route::post('/Alumno/createSolicitud/{id}','AlumnoController@createSolicitud');
Route::put('/Alumno/{id}','AlumnoController@update');
Route::get('/Alumno/{id}','AlumnoController@show');
Route::delete('/Alumno/{id}','AlumnoController@destroy');
Route::get('/Alumno/getNombre/{id}','AlumnoController@getAlumnoName');
Route::get('/getSemestre','AlumnoController@obtenerSemestre');
Route::get('/verCalificaciones/{id}','AlumnoController@verCalificaciones');
Route::get('/verCalificacionesOld/{id}','AlumnoController@verCalificacionesOld');
Route::get('/Alumno/RamosTomables/{id}','AlumnoController@ramosTomables');
Route::delete('/Alumno/desinscribir/{id}/{seccion}','AlumnoController@desinscribirAsignatura');
Route::get('/Alumno/getHorario/{id}','AlumnoController@getHorario');
Route::post('/Alumno/sugerirRamos/{id}','AlumnoController@sugerirRamos');
Route::get('/Alumno/verHorarioArray/{id}','AlumnoController@verHorarioArray');
Route::get('/Alumno/getPagos/{id}','AlumnoController@getPagos');
Route::get('/Alumno/downloadCertificado/{id}','AlumnoController@downloadCertificado');
Route::get('/Alumno/downloadComprobante/{id}','AlumnoController@downloadComprobante');
Route::get('/Alumno/downloadSolicitud/{id}','AlumnoController@downloadSolicitud');
//Rutas Asignatura
Route::get('/Asignatura','AsignaturaController@index');
Route::post('/Asignatura','AsignaturaController@store');
Route::post('/Asignatura/addSeccion/{id}','AsignaturaController@addSeccion');
//Route::get();SHOW
Route::get('/Asignatura/getHorarios/{id}','AsignaturaController@getHorarios');


Route::put('/Asignatura/{id}','AsignaturaController@update');
Route::delete('/Asignatura/{id}','AsignaturaController@destroy');
Route::get('/Asignatura/getSecciones/{id}','AsignaturaController@getSecciones');

//Rutas Carrera
Route::get('/Carrera','CarreraController@index');
Route::post('/Carrera','CarreraController@store');
//Route::get();SHOW
Route::get('/Carrera/showMalla/{id}','CarreraController@showMalla');
Route::put('/Carrera/addMalla/{id}','CarreraController@addMalla');
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
Route::get('/CoordinadorDocente/getNombre/{id}','CoordinadorDocenteController@getName');
Route::post('/CoordinadorDocente/crearSeccion/{id}', 'CoordinadorDocenteController@crearSeccion');
Route::put('/CoordinadorDocente/editarSeccion/{id}', 'CoordinadorDocenteController@editarSeccion');
Route::delete('/CoordinadorDocente/eliminarSeccion/{id}', 'CoordinadorDocenteController@eliminarSeccion');
Route::delete('/CoordinadorDocente/{id}','CoordinadorDocenteController@destroy');
Route::get('/CoordinadorDocente/{id}','CoordinadorDocenteController@show');
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
Route::get('/Profesor/verEstudios/{id}','ProfesorController@verEstudios');
Route::get('/Profesor/verHorario/{id}','ProfesorController@verHorario');
Route::get('/Profesor/obtenerHorario/{id}','ProfesorController@obtenerHorario');
Route::post('/Profesor','ProfesorController@store');
Route::get('/Profesor/obtenerSecciones/{i}','ProfesorController@obtenerSecciones');
Route::post('Profesor/subirEstudio/{i}','ProfesorController@subirEstudio');
Route::get('Profesor/bajarEstudio/','ProfesorController@descargarEstudio');
//Route::get();SHOW
Route::get('/Profesor/verEstudios/{id}','ProfesorController@verEstudios');
Route::put('/Profesor/{id}','ProfesorController@update');
Route::post('/Profesor/crearMensaje/{id}','ProfesorController@crearMensaje');
Route::delete('/Profesor/{id}','ProfesorController@destroy');
Route::get('/Profesor/{id}','ProfesorController@show');
Route::get('/Profesor/getSecciones/{id}','ProfesorController@verSecciones');
//Rutas Sala
Route::get('/Sala','SalaController@index');
Route::post('/Sala','SalaController@store');
//Route::get();SHOW
Route::put('/Sala/{id}','SalaController@update');
Route::delete('/Sala/{id}','SalaController@destroy');

//Rutas Seccion
Route::get('/Seccion','SeccionController@index');
Route::get('/Seccion/getHorarios/{id}','SeccionController@getHorarios');
Route::get('/Seccion/obtenerAlumnos/{id}','SeccionController@obtenerAlumnos');
Route::post('/Seccion/addHorario/{id}','SeccionController@addHorario');
Route::post('/Seccion','SeccionController@store');
//Route::get();SHOW
Route::put('/Seccion/{id}','SeccionController@update');
Route::delete('/Seccion/{id}','SeccionController@destroy');
Route::get('/Seccion/obtenerInfo/{id}','SeccionController@obtenerInfo');
Route::get('/Seccion/getSalaSeccion/{id}','SeccionController@getSalaSeccion');
Route::get('/Seccion/obtenerAlumnosVista/{id}','SeccionController@obtenerAlumnosVista');

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

Route::get('/dashboard', function () {
    return view('alumnoSidebar');
});

Route::get('/redirect', 'Auth\LoginController@redirectToProvider');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');

Route::group(['middleware' => 'web'], function () {
	
	Route::auth();
	
	Route::get('/', function () {
    return view('welcome');
	});
	
	Route::group(['prefix' => 'alumno','middleware' => 'assign.guard:alumno,/login'],function(){
		
		Route::get('{id}/home/',function ($id)
		{
			return view('alumnohome');
		});
	});

	Route::group(['prefix' => 'profesor','middleware' => 'assign.guard:profesor,/login'],function(){
		
		Route::get('{id}/home/',function ($id)
		{
			return view('profesorhome');
		});
	});

	Route::group(['prefix' => 'coordinador','middleware' => 'assign.guard:coordinador,/login'],function(){
		
		Route::get('{id}/home/',function ($id)
		{
			return view('coordinadorhome');
		});
	});

	Route::group(['prefix' => 'administrador','middleware' => 'assign.guard:administrador,/login'],function(){
		
		Route::get('{id}/home/',function ($id)
		{
			return view('administradorhome');
		});
	});


	Route::get('/loginMulti/{tipo_login}/{rut}/{pass}','Auth\LoginController@loginMulti');
	Route::get('/getLoggedUserName','Auth\LoginController@getLoggedUserName');
});

Route::get('/logout', function() {
    Auth::logout();
    return redirect('/');
});

/*
Route::get('/oauth/gmail', function (){
    return LaravelGmail::redirect();
});

Route::get('/oauth/gmail/callback', function (){
    LaravelGmail::makeToken();
    return redirect()->to('/');
});

Route::get('/oauth/gmail/logout', function (){
    LaravelGmail::logout(); //It returns exception if fails
    return redirect()->to('/');
});
*/
