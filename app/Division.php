<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\NotaPeriodo;
use App\NotaDivision;

class Division extends Model{
    protected $primaryKey = "pk_division";
    protected $table = 'division';
    protected $guarded = ['porcentaje'];
    protected $dates = ['deleted_at'];

    public function notas()
    {
      return $this->hasMany('App\Nota','fk_division','pk_division');
    }
    
    public function crearNotasDivision(){
      $notasPeriodo=NotaPeriodo::join('periodo','nota_periodo.fk_periodo','=','periodo.pk_periodo')->where('periodo.ano',date('Y'))->get();
      foreach ($notasPeriodo as $i) {
        NotaDivision::create(['fk_division'=>$this->pk_division,'fk_nota_periodo'=>$i->pk_nota_periodo]);
      }
    }

    public function cambioPorcentaje(){
      //Se actualizan todos los periodos
      $periodos=NotaPeriodo::select('nota_periodo.*')->join('periodo','nota_periodo.fk_periodo','=','periodo.pk_periodo')->where('periodo.ano',date('Y'))->get();
      foreach ($periodos as  $p) {
        $p->actualizarNota();
      }
    }
}
