<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriaBoletin extends Model
{
    protected $table = 'materia_boletin';
    protected $primaryKey = 'pk_materia_boletin';
    protected $fillable = ['fk_materia_pc','fk_boletin','nota_materia'];
}
