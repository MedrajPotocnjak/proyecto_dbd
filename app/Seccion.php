<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    //
    protected $table='seccion';
	protected $primaryKey='codigo';
    protected $fillable=['nombre','cupos','tipo','rut_profesor','codigo_asignatura'];
    public function seccion_salas(){
    	return $this->hasMany(Seccion_Sala::class);
    }
    public function seccion_alumnos(){
    	return $this->hasMany(Seccion_Alumno::class);
    }
    public function profesores(){
    	return $this->belongsTo(Profesor::class);
    }
    public function asignaturas(){
    	return $this->belongsTo(Asignatura::class);
    }
}
