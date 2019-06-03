<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificado_Alumno extends Model
{
    //
    protected $table = 'certificados_alumnos';
    public function certificados(){
    	return $this->belongsTo('App\Certificado');
    }
    public function alumnos(){
    	return $this->belongsTo('App\Alumno');
    }
}
