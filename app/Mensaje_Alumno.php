<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje_Alumno extends Model
{
    //
    public function alumnos(){
    	return $this->belongsTo('App\Alumno');
    }
    public function mensajes(){
    	return $this->belongsTo('App\Mensaje');
    }
}