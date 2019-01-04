<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model{
    protected $table = 'archivo';
    protected $primaryKey = 'pk_archivo';
    protected $fillable = ['titulo', 'descripcion', 'tipo', 'fk_empleado', 'link'];
}
