<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //
    protected $table= 'alumno';
    protected $filliable= ['rut','nombre','apellido_paterno','apellido_materno','nivel','ingreso','password','asignaturas_aprovadas','nas','ppa','nar','fecha_nacimiento','nacionalidad','estado_civil','sexo','telefono','region','provincia','comuna','correo'];
    public function pagos(){
    	return $this->hasMany('App\Pago');
    }
    public function solicitudes_alumno(){
    	return $this->hasMany('App\Solicitud_Alumno');
    }
    public function certificados_alumno(){
    	return $this->hasMany('App\Certificado_Alumno');
    }
    public function mensajes_alumno(){
    	return $this->hasMany('App\Mensaje_Alumno');
    }
    public function seccion_alumno(){
    	return $this->hasMany('App\Seccion_Alumno');
    }
}
