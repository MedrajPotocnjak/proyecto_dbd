<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //
    protected $table= 'departamento';
    protected $fillable= ['nombre'];
	protected $primaryKey='codigo';
    public function coordinador_docente(){
    	return $this->hasOne(CoordinadorDocente::class);
    }
    public function estudios(){
    	return $this->hasMany(Estudio::class);
    }
    public function carreras(){
    	return $this->hasMany(Carrera::class);
    }
}
