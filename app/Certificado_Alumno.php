<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificado_Alumno extends Model
{
    //
    protected $table = 'certificado_alumno';
    public function certificados(){
    	return $this->belongsTo('App\Certificado','folio_certificado');
    }
    public function alumnos(){
    	return $this->belongsTo('App\Alumno','rut_alumno');
    }
}
