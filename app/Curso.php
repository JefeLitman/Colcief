<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model {
    protected $table = 'curso';
    protected $primaryKey = 'pk_curso';
    protected $fillable = ['pk_curso', 'prefijo', 'sufijo','ano'];
    protected $dates = ['deleted_at'];

    public function boletin(){
        return $this->hasMany('App\Boletin');
    }

    public function estudiante(){
        return $this->hasMany('App\Estudiante');
    }
}
