<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud_Alumno extends Model
{
    //
    protected $table = 'solicitud_alumno';
    public function solicitudes(){
    	return $this->belongsTo(Solicitud::class);
    }
    public function alumnos(){
    	return $this->belongsTo(Alumno::class);
    }
}
