<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MateriaBoletin;
use App\NotaPeriodo;

class Periodo extends Model
{
    protected $table = 'periodo';
    protected $primaryKey = 'pk_periodo';
    protected $fillable = ['pk_periodo','nro_periodo','fecha_inicio','fecha_limite', 'recuperacion_inicio', 'recuperacion_limite', 'ano'];
    protected $guarded = [];

    public function notasPeriodo(){
      return $this->hasMany('App\NotaPeriodo','fk_periodo','pk_periodo');
    }

    public function crearEstructuraDatos(){
      $materiasB=MateriaBoletin::where('materia_pc.created_at','like','%'.date('Y').'%')->get();
      foreach ($materiasB as $m) {
        NotaPeriodo::create([
          'fk_materia_boletin'=>$m->pk_materia_boletin,
          'fk_periodo'=>$this->pk_periodo
        ]);
      }
    }
}
