<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
	protected $table = 'materia';
    protected $primaryKey = 'pk_materia';
    protected $fillable = ['nombre','contenido','logros_custom'];
}
