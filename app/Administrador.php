<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrador extends Authenticatable
{
    //
    protected $table='administrador';
    protected $fillable= ['rut','password','nombre','apellido_paterno','apellido_materno'];
}
