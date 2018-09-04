<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleado';
    protected $primaryKey = 'pk_empleado';
    protected $fillable = ['pk_empleado', 'cedula','nombre', 'apellido', 'correo', 'clave', 'direccion', 'titulo', 'rol', 'tiempo_extra', 'director', 'estado', 'foto'];
    protected $dates = ['deleted_at'];
}
