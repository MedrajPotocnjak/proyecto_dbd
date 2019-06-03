<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profesor extends Model
{
    //
    protected $table='profesores';
    protected $fillable=['nombres','apellido_paterno','apellido_materno','password','area','fecha_nacimiento','nacionalidad','sexo','telefono','region','provincia','comuna','correo'];
    public function secciones(){
    	return $this->hasMany('App\Seccion');
    }
    public function mesajes(){
    	return $this->hasMany('App\Mensaje');
    }
}
