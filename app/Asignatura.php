<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    //
    protected $table= 'asignatura';
	protected $primaryKey='codigo';
    protected $fillable = ['nombre','jornada','asistencia_minima','ponderacion','nivel','horas_teoria','horas_laboratorio','horas_ejercicios','version_plan_estudios'];
    public function carreras_asignatura(){
    	return $this->hasMany(Carrera_Asignatura::class);
    }
    public function secciones(){
    	return $this->hasMany(Seccion::class);
    }
}
