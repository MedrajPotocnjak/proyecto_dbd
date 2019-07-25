<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    //
    protected $table='mensaje';
    protected $fillable=['asunto','contenido','rut_profesor'];
    public function mensaje_alumnos(){
    	return $this->hasMany(Mensaje_Alumno::class);
    }
    public function profesores(){
    	return $this->belongsTo(Profesor::class);
    }
}
