<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion_Sala extends Model
{
    //
    protected $table = 'secciones_salas';
    protected $fillable = ['bloque'];
    public function secciones(){
    	return $this->belongsTo('App\Seccion');
    }
    public function salas(){
    	return $this->belongsTo('App\Sala');
    }
}
