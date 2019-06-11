<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion_Alumno extends Model
{
    //
    protected $table='seccion_alumno';
	protected $primaryKey='codigo';
 	protected $fillable= ['aprobado','promedio','nota_p1','nota_p2','nota_p3','nota_c1','nota_c2','nota_c3','estado_cursado'];
 	public function secciones(){
 		return $this->belongsTo(Seccion::class);
 	}  
 	public function alumnos(){
 		return $this->belongsTo(Alumno::class);
 	} 
}
