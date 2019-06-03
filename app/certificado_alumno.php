<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class certificado_alumno extends Model
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