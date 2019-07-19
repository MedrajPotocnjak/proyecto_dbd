<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CoordinadorDocente extends Authenticatable
{
    //
    protected $table= 'coordinador_docente';
    protected $fillable=['rut','password','nombres','apellido_paterno','apellido_materno'];
    public function departamento(){
    	return $this->belongsTo(Departamento::class);
    }
}
