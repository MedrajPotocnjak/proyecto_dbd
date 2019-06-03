<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //
    protected $table= 'departamentos';
    protected $fillable='nombre';
    public function coordinador_docente(){
    	return $this->hasOne('App\Coordinador_Docente');
    }
    public function estudios(){
    	return $this->hasMany('App\Estudio');
    }
    public function carreras(){
    	return $this->hasMany('App\Carrera');
    }
}
