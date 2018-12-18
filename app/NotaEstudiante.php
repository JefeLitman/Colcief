<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotaEstudiante extends Model
{
    protected $table = 'nota_estudiante';
    protected $primaryKey = 'pk_nota_estudiante';
    protected $guarded=[];

    public function nota()
    {
      return $this->belongsTo('App\Nota','fk_nota','pk_nota');
    }

    public function estudiante()
    {
      return $this->belongsTo('App\Estudiante','fk_estudiante','pk_estudiante');
    }

    public function notaPeriodo()
    {
      return $this->belongsTo('App\NotaPeriodo','fk_nota_periodo','pk_nota_periodo');
    }
}
