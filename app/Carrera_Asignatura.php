<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera_Asignatura extends Model
{
    //
    protected $table='carrera_asignaturas';
    public function asignaturas(){
    	return $this->belongsTo('App\Asignatura','codigo_asignatura');
    }
    public function carreras(){
    	return $this->belongsTo('App\Carrera','codigo_carrera');
    }
}
