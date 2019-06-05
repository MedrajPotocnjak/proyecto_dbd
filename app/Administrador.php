<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    //
    protected $table='administrador';
    protected $fillable= ['rut','password','nombres','apellido_paterno','apellido_materno'];
}
