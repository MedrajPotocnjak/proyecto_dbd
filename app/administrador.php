<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class administrador extends Model
{
    //
    protected $table='administradores';
    protected $fillable= ['password','nombres','apellido_paterno','apellido_materno'];
}
