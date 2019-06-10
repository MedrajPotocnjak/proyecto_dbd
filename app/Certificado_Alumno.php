<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificado_Alumno extends Model
{
    //
    protected $table = 'certificado_alumno';
    public function certificados(){
    	return $this->belongsTo(Certificado::class);
    }
    public function alumnos(){
    	return $this->belongsTo(Alumno::class);
    }
}
