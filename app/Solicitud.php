<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    //
	protected $table = 'solicitud';
	protected $primaryKey='codigo';
	protected $fillable = ['contenido', 'ruta_formato'];
	public function solicitudes(){
		return $this->hasMany(Solicitud_Alumno::class);
	}
}