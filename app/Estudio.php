<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    //
    protected $table='estudio';
	protected $primaryKey='codigo';
    protected $fillable=['area','titulo','contenido','ruta_estudio'];
    public function departamento(){
    	return $this->belongsTo(Departamento::class);
    }
}
