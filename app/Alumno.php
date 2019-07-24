<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Alumno extends Authenticatable
{
    protected $table= 'alumno';
    protected $filliable= ['rut','nombre','codigo_carrera','apellido_paterno','apellido_materno','nivel','ingreso','password','asignaturas_aprobadas','targeta_credito','fecha_caducidad','cvc','nas','ppa','nar','fecha_nacimiento','nacionalidad','estado_civil','sexo','telefono','region','provincia','comuna','correo'];
    public function pagos(){
    	return $this->hasMany(Pago::class);
    }
    public function solicitudes_alumno(){
    	return $this->hasMany(Solicitud_Alumno::class);
    }
    public function certificados_alumno(){
    	return $this->hasMany(Certificado_Alumno::class);
    }
    public function mensajes_alumno(){
    	return $this->hasMany(Mensaje_Alumno::class);
    }
    public function seccion_alumno(){
    	return $this->hasMany(Seccion_Alumno::class);
    }
}
