<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horario';
    protected $primaryKey = 'pk_horario';
    protected $fillable = ['pk_horario', 'fk_materia_pc', 'dia', 'hora_inicio', 'hora_fin'];

    public function MateriaPC()
    {
        return $this->belongsTo('App\Horario', 'fk_materia_pc', 'pk_materia_pc');
    }

    public function attrs()
    {
        return $this->attributes;
    }

    public static function findOrCreate($id)
    {
        $obj = Horario::find($id);
        return $obj ?: new Horario;
    }
}
