<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    //
    protected $table='matriculas';
    protected $fillable=['estado_matricula','costo'];
    public function pagos(){
    	return $this->belogsTo('App\Pago');
    }
}
