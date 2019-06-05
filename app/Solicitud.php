<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    //
	protected $table = 'Solicitud';
	protected $fillable = ['fecha', 'contenido', 'ruta_formato'];
	public function solicitudes(){
		return $this->hasMany('App\Solicitud_Alumno');
	}
}