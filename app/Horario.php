<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horario';
    protected $primaryKey = 'pk_horario';
    protected $fillable = ['pk_horario', 'fk_materia_pc','dia', 'hora_inicio', 'hora_fin'];
    protected $guarded = [];
}
