<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    //
    protected $table='secciones';
    protected $fillable=['nombre','cupos','tipo'];
    public function seccion_salas(){
    	return $this->hasMany('App\Seccion_Sala');
    }
    public function seccion_alumnos(){
    	return $this->hasMany('App\Seccion_Alumno');
    }
    public function profesores(){
    	return $this->belongsTo('App\Profesor');
    }
    public function asignaturas(){
    	return $this->belongsTo('App\Asignatura');
    }
}
