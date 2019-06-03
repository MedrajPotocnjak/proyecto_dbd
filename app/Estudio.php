<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    //
    protected $table='estudios';
    protected $fillable=['area','titulo','contenido','ruta_estudio'];
    public function departamento(){
    	return $this->belongsTo('App\Departamento');
    }
}
