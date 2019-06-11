<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera_Asignatura extends Model
{
    //
    protected $table='carrera_asignaturas';
    public function asignaturas(){
    	return $this->belongsTo(Asignatura::class);
    }
    public function carreras(){
    	return $this->belongsTo(Carrera::class);
    }
}
