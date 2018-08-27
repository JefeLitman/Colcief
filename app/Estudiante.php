<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Estudiante extends Authenticatable{
    protected $table = 'estudiante';
    protected $fillable = [
        'pk_estudiante', 'fk_acudiente', 'nombre', 'apellido', 'clave','fecha_nacimiento', 'grado', 'discapacidad',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}

