<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud_Alumno extends Model
{
    //
    protected $table = 'solicitudes_alumnos';
    public function solicitudes(){
    	return $this->belongsTo('App\Solicitud');
    }
}