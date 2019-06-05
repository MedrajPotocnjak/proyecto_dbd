<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    //
    protected $table='mensaje';
    protected $fillable=['asunto','contenido','fecha'];
    public function mensaje_alumnos(){
    	return $this->hasMany('App\Mensaje_Alumno');
    }
    public function profesores(){
    	return $this->belongsTo('App\Profesor','rut_profesor');
    }
}
