<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensualidad extends Model
{
    //
    protected $table = 'mensualidad';
    protected $fillable = ['numero_mensualidad', 'costo'];
    public function pagos(){
    	return $this->belongsTo('App\Pago','codigo_pago');
    }
}
}
