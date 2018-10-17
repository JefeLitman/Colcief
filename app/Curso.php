<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'curso';
    protected $primaryKey = 'pk_curso';
    protected $fillable = ['pk_curso', 'nombre'];
    protected $dates = ['deleted_at'];
}
