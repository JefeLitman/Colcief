<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estudiante extends Authenticatable{
    use SoftDeletes;
    use Notifiable;
	protected $primaryKey = "pk_estudiante";
    protected $table = 'estudiante';    
    protected $fillable = ['pk_estudiante', 'fk_acudiente','nombre', 'apellido', 'password', 'fecha_nacimiento', 'grado', 'discapacidad', 'estado', 'foto'];
    protected $dates = ['deleted_at'];
    protected $casts = ['discapacidad' => 'boolean', 'estado' => 'boolean'];

    public function session(){
        return $this->fillable;
    }
}

