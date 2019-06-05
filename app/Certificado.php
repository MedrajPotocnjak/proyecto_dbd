<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificado extends Model
{
    //
    protected $table='certificado';
    protected $fillable=['codigo_verificacion','contenido','fecha','ruta_formato'];
    public function certificados_alumno(){
    	return $this->hasMany('App\Certificado_Alumno');
    }
}
}
