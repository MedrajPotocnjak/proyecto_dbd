<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion_Sala extends Model
{
    //
    protected $table = 'seccion_salas';
    protected $fillable = ['bloque'];
    public function secciones(){
    	return $this->belongsTo(Seccion::class);
    }
    public function salas(){
    	return $this->belongsTo(Sala::class);
    }
}
