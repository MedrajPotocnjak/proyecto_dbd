<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mensaje extends Model
{
    //
    protected $table='mensajes';
    protected $fillable=['asunto','contenido','fecha'];
    public function mensaje_alumnos(){
    	return $this->hasMany('App\Mensaje_Alumno');
    }
    public function profesores(){
    	return $this->belongsTo('App\Profesor');
    }
}
