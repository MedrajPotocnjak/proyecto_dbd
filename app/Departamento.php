<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //
    protected $table= 'departamento';
    protected $fillable=['nombre'];
	protected $primaryKey='codigo';
    public function coordinador_docente(){
    	return $this->hasOne('App\Coordinador_Docente','rut_coordinador');
    }
    public function estudios(){
    	return $this->hasMany('App\Estudio');
    }
    public function carreras(){
    	return $this->hasMany('App\Carrera');
    }
}
