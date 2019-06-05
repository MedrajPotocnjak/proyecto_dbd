<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion_Alumno extends Model
{
    //
    protected $table='alumno_seccion';
 	protected $fillable= ['aprobado','promedio','nota_p1','nota_p2','nota_p3','nota_c1','nota_c2','nota_c3','estado_cursado'];
 	public function secciones(){
 		return $this->belongsTo('App\Seccion','codigo_seccion');
 	}  
 	public function alumnos(){
 		return $this->belongsTo('App\Alumno','rut_alumno');
 	} 
}
