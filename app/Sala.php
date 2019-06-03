<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    //
    protected $table='salas';
    protected $fillable=['nombre','ubicacion','cantidad_puestos','cantidad_computadores'];
    public function secciones_sala(){
    	return $this->hasMany('App\Seccion_Sala');
    }
}
