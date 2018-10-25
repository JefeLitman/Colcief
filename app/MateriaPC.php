<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriaPC extends Model
{
    protected $table = 'materia_pc';
    protected $primaryKey = 'pk_materia_pc';
    protected $fillable = ['nombre','fk_curso','fk_empleado','fk_materia','curso','salon'];
}
