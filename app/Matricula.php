<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    //
    protected $table='matricula';
	protected $primaryKey='codigo';
    protected $fillable=['estado_matricula','costo'];
    public function pagos(){
    	return $this->belogsTo(Pago::class);
    }
}
