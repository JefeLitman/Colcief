<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriaPC extends Model
{
    protected $table = 'materia_pc';
    protected $primaryKey = 'pk_materia_pc';
    protected $fillable = ['nombre','fk_curso','fk_empleado','fk_materia','curso','salon'];

    public function Notas()
    {
      return $this->hasMany('App\Nota','fk_materia_pc','pk_materia_pc');
    }

    public function Materia()
    {
      return $this->belongsTo('App\Materia','fk_materia','pk_materia');
    }

    public function Empleado()
    {
      return $this->belongsTo('App\Empleado','fk_empleado','pk_empleado');
    }

    public function Curso()
    {
      return $this->belongsTo('App\Curso','fk_curso','pk_curso');
    }

    public function Horarios(){
      return $this->hasMany('App\Horario', 'fk_materia_pc', 'pk_materia_pc');
    }
}
