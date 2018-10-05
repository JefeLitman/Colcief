<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Empleado extends Authenticatable
{
    use Notifiable;
    protected $table = 'empleado';
    protected $primaryKey = 'pk_empleado';
    protected $fillable = ['pk_empleado', 'cedula','nombre', 'apellido', 'correo', 'password', 'direccion', 'titulo', 'rol', 'tiempo_extra', 'director', 'estado', 'foto'];
    protected $dates = ['deleted_at'];
    protected $casts = ['estado' => 'boolean'];
}
