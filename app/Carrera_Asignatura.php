<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera_Asignatura extends Model
{
    //
    protected $table='carreras_asignaturas';
    public function asignaturas(){
    	return $this->belongsTo('App\Asignatura');
    }
    public function carreras(){
    	return $this->belongsTo('App\Carrera');
    }
}