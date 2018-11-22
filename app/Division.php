<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model{
    protected $primaryKey = "pk_division";
    protected $table = 'division';
    protected $guarded = ['porcentaje'];
    protected $dates = ['deleted_at'];

    public function notas()
    {
      return $this->hasMany('App\Nota','fk_division','pk_division');
    }
}
