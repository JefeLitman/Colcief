<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Estudiante extends Authenticatable{
	protected $primaryKey = "pk_estudiante";
    protected $table = 'estudiante';    
    protected $fillable = ['pk_estudiante', 'fk_acudiente','nombre', 'apellido', 'clave', 'fecha_nacimiento', 'grado', 'discapacidad', 'estado', 'foto'];
    protected $dates = ['deleted_at'];
}

