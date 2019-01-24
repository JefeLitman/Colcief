<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fecha extends Model {
    protected $table = 'fecha';
    protected $primaryKey = 'pk_fecha';
    protected $fillable = ['pk_fecha', 'inicio_escolar','fin_escolar', 'ano'];  
}
