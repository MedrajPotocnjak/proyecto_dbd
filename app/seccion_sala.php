<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seccion_sala extends Model
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