<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MateriaBoletin;
use App\NotaPeriodo;
use App\Recuperacion;
use App\Boletin;
use App\Puesto;
use App\Curso;
use Illuminate\Support\Facades\DB;

class Periodo extends Model {
  protected $table = 'periodo';
  protected $primaryKey = 'pk_periodo';
  protected $fillable = ['pk_periodo','nro_periodo','fecha_inicio','fecha_limite', 'recuperacion_inicio', 'recuperacion_limite', 'ano'];
  protected $guarded = [];

  public function notasPeriodo(){
    return $this->hasMany('App\NotaPeriodo','fk_periodo','pk_periodo');
  }

  public function crearEstructuraDatos(){ //By Paola
    $materiasB=MateriaBoletin::where('materia_pc.created_at','like','%'.date('Y').'%')->get();
    foreach ($materiasB as $m) {
      NotaPeriodo::create([
        'fk_materia_boletin'=>$m->pk_materia_boletin,
        'fk_periodo'=>$this->pk_periodo
      ]);
    }
  }

  public function crearRecuperaciones(){ //By Paola
    $notasPeriodo=NotaPeriodo::where([['fk_periodo',$this->pk_periodo],['nota_periodo','<',3.0]])->get();
    foreach ($notasPeriodo as $n) {
      Recuperacion::create([
        "fk_nota_periodo"=>$n->pk_nota_periodo
      ]);
    }
  }

  public function toArrayOnly(...$attrs){
    $at = [];
    foreach ($attrs as $value) {
      $at[$value] = $this->$value;
    }
    return $at;
  }

  public function asignarPuestos(){
    
    $cursos=Curso::where('ano',date('Y'))->where('pk_curso',10)->get();
    foreach ($cursos as $c) {
      $puestos=[];
      $boletines=Boletin::select(
        DB::raw("SUM(nota_periodo.nota_periodo)/COUNT(nota_periodo) as promedio_periodo"),
        'boletin.pk_boletin',
        'nota_periodo.fk_periodo'
      )
      ->leftjoin('materia_boletin','materia_boletin.fk_boletin','=','boletin.pk_boletin')
      ->leftjoin('nota_periodo','nota_periodo.fk_materia_boletin','=','materia_boletin.pk_materia_boletin')
      ->where([['boletin.ano',date('Y')],['fk_periodo',$this->pk_periodo],['boletin.fk_curso',$c->pk_curso]])
      ->groupBy('boletin.pk_boletin')
      ->orderBy('promedio_periodo')
      ->get();
      $i=0;
      $ultimo_valor=0.0;
      foreach ($boletines as $b) {
        if($b->promedio_periodo==$ultimo_valor){
          if($i==0){
            $i=1;
          }
        }else{
          $i++;
          $ultimo_valor=$b->promedio_periodo;
        }
        


      }

    }
    
    dd($cursos);
    // dd($boletines);
  }
}
