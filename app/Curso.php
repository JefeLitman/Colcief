<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'curso';
    protected $primaryKey = 'pk_curso';
    protected $fillable = ['pk_curso', 'nombre','logros_custom'];
    protected $dates = ['deleted_at'];
}
