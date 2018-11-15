<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Authenticatable{
    use Notifiable;
    use SoftDeletes;
    protected $table = 'empleado';
    protected $primaryKey = 'cedula';
    protected $fillable = ['cedula','nombre', 'apellido', 'correo', 'password', 'direccion', 'titulo', 'role', 'tiempo_extra', 'fk_curso', 'estado', 'foto'];
    protected $dates = ['deleted_at'];
    protected $casts = ['estado' => 'boolean'];

    public function session(){
        return $this->attributes;
    }
}
