<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acudiente extends Model{
    protected $primaryKey = 'pk_acudiente';
    protected $table = 'acudiente';
    protected $guarded = [];
    protected $fillable = [
      'pk_acudiente',
      'nombre_acu_1',
      'direccion_acu_1',
      'telefono_acu_1',
      'nombre_acu_2',
      'direccion_acu_2',
      'telefono_acu_2',
    ];
    protected $dates = ['deleted_at'];
}
