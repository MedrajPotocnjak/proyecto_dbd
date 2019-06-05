<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud_Alumno extends Model
{
    //
    protected $table = 'solicitud_alumno';
    public function solicitudes(){
    	return $this->belongsTo('App\Solicitud','codigo_solicitud');
    }
    public function alumnos(){
    	return $this->belongsTo('App\Alumno','rut_alumno');
    }
}
