<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
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
