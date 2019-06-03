<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class certificado extends Model
{
    //
    protected $table='certificados';
    protected $fillable=['codigo_verificacion','contenido','fecha','ruta_formato'];
    public function certificados_alumno(){
    	return $this->hasMany('App\Certificado_Alumno');
    }
}
