<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion_Sala extends Model
{
    //
    protected $table = 'seccion_salas';
    protected $fillable = ['bloque'];
    public function secciones(){
    	return $this->belongsTo('App\Seccion','codigo_seccion');
    }
    public function salas(){
    	return $this->belongsTo('App\Sala','codigo_sala');
    }
}
