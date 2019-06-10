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

//Rutas Estudio
Route::get('/Estudio','EstudioController@index');
Route::post('/Estudio','EstudioController@store');
//Route::get();SHOW
Route::put('/Estudio/{id}','EstudioController@update');
Route::delete('/Estudio/{id}','EstudioController@destroy');

//Rutas Departamento
Route::get('/Departamento','DepartamentoController@index');
Route::post('/Departamento','DepartamentoController@store');
//Route::get();SHOW
Route::put('/Departamento/{id}','DepartamentoController@update');
Route::delete('/Departamento/{id}','DepartamentoController@destroy');

//Rutas Carrera
Route::get('/Carrera','CarreraController@index');
Route::post('/Carrera','CarreraController@store');
//Route::get();SHOW
Route::put('/Carrera/{id}','CarreraController@update');
Route::delete('/Carrera/{id}','CarreraController@destroy');

//Rutas Asignatura
Route::get('/Asignatura','AsignaturaController@index');
Route::post('/Asignatura','AsignaturaController@store');
//Route::get();SHOW
Route::put('/Asignatura/{id}','AsignaturaController@update');
Route::delete('/Asignatura/{id}','AsignaturaController@destroy');

//Rutas Alumno
Route::get('/Alumno','AlumnoController@index');
Route::post('/Alumno','AlumnoController@store');
//Route::get();SHOW
Route::put('/Alumno/{id}','AlumnoController@update');
Route::delete('/Alumno/{id}','AlumnoController@destroy');

//Rutas Solicitud
Route::get('/Solicitud','SolicitudController@index');
Route::post('/Solicitud','SolicitudController@store');
//Route::get();SHOW
Route::put('/Solicitud/{id}','SolicitudController@update');
Route::delete('/Solicitud/{id}','SolicitudController@destroy');

//Rutas Sala
Route::get('/Sala','SalaController@index');
Route::post('/Sala','SalaController@store');
//Route::get();SHOW
Route::put('/Sala/{id}','SalaController@update');
Route::delete('/Sala/{id}','SalaController@destroy');

//Rutas Pago
Route::get('/Pago','PagoController@index');
Route::post('/Pago','PagoController@store');
//Route::get();SHOW
Route::put('/Pago/{id}','PagoController@update');
Route::delete('/Pago/{id}','PagoController@destroy');

//Rutas Profesor
Route::get('/Profesor','ProfesorController@index');
Route::post('/Profesor','ProfesorController@store');
//Route::get();SHOW
Route::put('/Profesor/{id}','ProfesorController@update');
Route::delete('/Profesor/{id}','ProfesorController@destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
