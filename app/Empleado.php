<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'empleado';
    protected $primaryKey = 'pk_empleado';
    protected $fillable = ['pk_empleado', 'cedula','nombre', 'apellido', 'correo', 'password', 'direccion', 'titulo', 'rol', 'tiempo_extra', 'director', 'estado', 'foto'];
    protected $dates = ['deleted_at'];
    protected $casts = ['estado' => 'boolean'];

    public function session(){
        return $this->fillable;
    }
}
