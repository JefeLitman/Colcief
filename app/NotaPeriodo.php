<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotaPeriodo extends Model
{
    protected $table = 'nota_periodo';
    protected $primaryKey = 'pk_nota_periodo';
    // protected $fillable = [];

    public function notasEstudiantes()
    {
      return $this->hasMany('App\NotaEstudiante','fk_nota_periodo','pk_nota_periodo');
    }

    public function MateriaBoletin()
    {
      return $this->belongsTo('App\MateriaBoletin','fk_materia_boletin','pk_materia_boletin');
    }
    
}
