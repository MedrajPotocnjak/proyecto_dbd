<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mensualidad extends Model
{
    //
    protected $table = 'mensualidades';
    protected $fillable = ['numero_mensualidad', 'costo'];
    public function pagos(){
    	return $this->belongsTo('App\Pago');
    }
}
