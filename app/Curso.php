<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model {
    protected $table = 'curso';
    protected $primaryKey = 'pk_curso';
    protected $fillable = ['pk_curso', 'prefijo', 'sufijo','ano'];
    protected $dates = ['deleted_at'];

    public function datos(){
        $this->attributes;
    }

    public function boletin(){
        return $this->hasMany('App\Boletin', 'fk_curso', 'pk_curso');
    }

    public function estudiantes(){
        return $this->hasMany('App\Estudiante', 'fk_curso','pk_curso');
    }
}
