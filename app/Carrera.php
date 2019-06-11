<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    //
    protected $table = 'carrera';
	protected $primaryKey='codigo';
    protected $fillable= ['nombre','asignaturas_plan','cantidad_alumnos','arancel'];
    public function departamento(){
    	return $this->belongsTo(Departamento::class);
    }
    public function carreras_asignatura(){
    	return $this->hasMany(Carrera_Asignatura::class);
    }
}
