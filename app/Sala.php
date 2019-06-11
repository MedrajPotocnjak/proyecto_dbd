<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    //
    protected $table='sala';
	protected $primaryKey='codigo';
    protected $fillable=['nombre','ubicacion','cantidad_puestos','cantidad_computadores'];
    public function secciones_sala(){
    	return $this->hasMany(Seccion_Sala::class);
    }
}
