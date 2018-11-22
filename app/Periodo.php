<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table = 'periodo';
    protected $primaryKey = 'pk_periodo';
    protected $guarded = [];

    public function notasPeriodo()
    {
      return $this->hasMany('App\NotaPeriodo','fk_periodo','pk_periodo');
    }
}
