<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carrera extends Model
{
    //
    protected $table = 'carreras';
    protected $fillable= ['nombre','asignaturas_plan','cantidad_alumnos','arancel'];
    public function departamento(){
    	return $this->Belongsto('App\Departamento');
    }
    public function carreras_asignatura(){
    	return $this->hasMany('App\Carrera_Asignatura');
    }
}
