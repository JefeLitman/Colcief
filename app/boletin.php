<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boletin extends Model
{
    protected $table = 'boletin';
    protected $primaryKey = 'pk_boletin';
    protected $guarded = ['nota_final'];

    public function estudiante()
    {
      return $this->belongsTo('App\Estudiante','fk_estudiante','pk_estudiante');
    }

    public function materia_boletines()
    {
      return $this->hasMany('App\MateriaBoletin','fk_boletin','pk_boletin');
    }

    public function curso()
    {
      return $this->belongsTo('App\Curso','fk_curso','pk_curso');
    }
}
