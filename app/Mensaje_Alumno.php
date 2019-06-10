<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje_Alumno extends Model
{
    //
	protected $primaryKey='codigo';
	
    public function alumnos(){
    	return $this->belongsTo('App\Alumno','rut_alumno');
    }
    public function mensajes(){
    	return $this->belongsTo('App\Mensaje','codigo_mensaje');
    }
}
