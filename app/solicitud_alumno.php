<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class solicitud_alumno extends Model
{
    //
    protected $table = 'solicitudes';
    public function solicitudes(){
    	return $this->belongsTo('App\Solicitud');
    }
}
