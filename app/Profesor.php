<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Profesor extends Authenticatable
{
    //
    protected $table='profesor';
    protected $fillable=['rut','nombres','apellido_paterno','apellido_materno','password','area','fecha_nacimiento','nacionalidad','sexo','telefono','region','provincia','comuna','correo'];
    public function secciones(){
    	return $this->hasMany(Seccion::class);
    }
    public function mensajes(){
    	return $this->hasMany(Mensaje::class);
    }
}
