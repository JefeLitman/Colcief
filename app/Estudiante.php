<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Estudiante extends Authenticatable{
    use Notifiable;
	protected $primaryKey = "pk_estudiante";
    protected $table = 'estudiante';    
    protected $fillable = ['pk_estudiante', 'fk_acudiente','nombre', 'apellido', 'clave', 'fecha_nacimiento', 'grado', 'discapacidad', 'estado', 'foto'];
    protected $dates = ['deleted_at'];
    protected $casts = ['discapacidad' => 'boolean', 'estado' => 'boolean'];
}

