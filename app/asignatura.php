<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asignatura extends Model
{
    //
    protected $table= 'asignaturas';
    protected $fillable = ['nombre','jornada','asistencia_minima','ponderacion','nivel','horas_teoria','horas_laboratorio','horas_ejercicios','version_plan_estudios'];
    public function carreras_asignatura(){
    	return $this->hasMany('App\Carrera_Asignatura');
    }
    public function secciones(){
    	return $this->hasMany('App\Seccion');
    }
}
