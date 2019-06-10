<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje_Alumno extends Model
{
    //
	protected $primaryKey='codigo';
	
    public function alumnos(){
    	return $this->belongsTo(Alumno::class);
    }
    public function mensajes(){
    	return $this->belongsTo(Mensaje::class);
    }
}
