<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acudiente extends Model{
    protected $primaryKey = 'pk_acudiente';
    protected $table = 'acudiente';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function estudiantes()
    {
      return $this->hasMany('App\Estudiante','fk_acudiente','pk_acudiente');
    }
}
