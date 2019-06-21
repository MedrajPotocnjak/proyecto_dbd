<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    //
    protected $table = 'pago';
	protected $primaryKey='codigo';
    protected $fillable = ['rut_alumno','tipo_pago', 'forma_pago'];
    public function mensualidades(){
    	return $this->hasMany(Mensualidad::class);
    }
    public function matriculas(){
    	return $this->hasMany(Matricula::class);
    }
    public function alumnos(){
    	return $this->belongsTo(Alumno::class);
    }
}
