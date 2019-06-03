<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pago extends Model
{
    //
    protected $table = 'pagos';
    protected $fillable = ['tipo_pago', 'forma_pago', 'fecha_pago'];
    public function mensualidades(){
    	return $this->hasMany('App\Mensualidad');
    }
    public function matriculas(){
    	return $this->hasMany('App\Matricula');
    }
    public function pagos(){
    	return $this->belongsTo('App\Alumno');
    }
}
