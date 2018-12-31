<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Boletin;

class Estudiante extends Authenticatable {

    use SoftDeletes;
    use Notifiable;
	protected $primaryKey = "pk_estudiante";
    protected $table = 'estudiante';
    protected $fillable = ['pk_estudiante','fk_curso','fk_acudiente','nombre', 'apellido', 'password', 'fecha_nacimiento', 'grado', 'discapacidad', 'estado', 'foto'];
    protected $dates = ['deleted_at'];
    protected $casts = ['discapacidad' => 'boolean', 'estado' => 'boolean'];
    protected $hidden = ['password'];

    public function session(){
        return $this->attributes;
    }

    public function curso(){
        return $this->belongsTo('App\Curso','fk_curso', 'pk_curso');
    }

    public function notasEstudiante()
    {
      return $this->hasMany('App\NotaEstudiante','fk_estudiante','pk_estudiante');
    }

    public function cambioCurso(){
        $boletin=Boletin::where([["ano",date('Y')],["fk_estudiante",$this->pk_estudiante]]);
    }
}
