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

   //By Paola
    /**
     * Esta funcion es llamada cuando se crea un periodo nuevo.
     * 
     * La funcion crea todas las tuplas de nota_periodo que debe tener cada estudiante
     * por cada materia que tenga. Ya que aqui se guarda la nota que saca ese estudiante 
     * en ese periodo.
     */
  public function crearEstructuraDatos(){ 
    $materiasB=MateriaBoletin::where('materia_pc.created_at','like','%'.date('Y').'%')->get();
    foreach ($materiasB as $m) {
      NotaPeriodo::create([
        'fk_materia_boletin'=>$m->pk_materia_boletin,
        'fk_periodo'=>$this->pk_periodo
      ]);
    }
  }

  //By Paola
  /**
   * Esta funcion se ejecutara el dia $this->fecha_limite que es el ultimo dia del periodo
   * el ultimo dia en el que los profesores podran editar las notas, por lo que al finalizar
   * ese periodo. Se procedera a revisar cada materia y saber que estuiantes perdieron la 
   * nota del periodo si esta nota es menor a 3 se les creara la tupla recuperacion.
   * 
   * Especificamente se deben crear el dia $this->recuperacion_inicio a las 00:00 am. 
   * Teniendo en cuenta que $this->recuperacion_inicio y $this->fecha_limite no pueden
   * ser el mismo día.
   */
  public function crearRecuperaciones(){ 
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

  //By Paola 
  /**
   * Los puestos deben ser asignados el dia siguiente del dia "recuperacion_fecha" 
   * de la tabla periodo.
   * Esta funcion asigna los puestos del periodo instanciado de la actual clase.
   * Los puestos tienen en consideracion las notas de recuperaciones, por lo que si 
   * el estudiante recuperó y esta nota es mayor a la sacada en la recuperacion de 
   * ese periodo de una determinada materia se acumulará la nota de la recuperacion 
   * y no la del periodo de la materia. En el caso contrario usará la nota_periodo
   * sacada en la respectiva materia.
   * Cuando varios estudiantes obtienen la misma nota en el promedio del periodo,
   * entonces estos compartiran el puesto del curso.
   */
  public function asignarPuestos(){
    $cursos=Curso::where('ano',date('Y'))->get();
    foreach ($cursos as $c) {
      $puestos=[];
      $boletines=Boletin::select(
        DB::raw("SUM(IF(recuperacion.nota>nota_periodo.nota_periodo,recuperacion.nota,nota_periodo.nota_periodo))/COUNT(nota_periodo) 
        as promedio_periodo"),
        'boletin.pk_boletin'
      )
      ->leftjoin('materia_boletin','materia_boletin.fk_boletin','=','boletin.pk_boletin')
      ->leftjoin('nota_periodo','nota_periodo.fk_materia_boletin','=','materia_boletin.pk_materia_boletin')
      ->leftjoin('recuperacion','recuperacion.fk_nota_periodo','=','nota_periodo.pk_nota_periodo')
      ->where([['boletin.ano',date('Y')],['fk_periodo',$this->pk_periodo],['boletin.fk_curso',$c->pk_curso]])
      ->groupBy('boletin.pk_boletin')
      ->orderBy('promedio_periodo','DESC')
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
        Puesto::create([
          'puesto'=>$i,
          'promedio_periodo'=>$b->promedio_periodo,
          'fk_boletin'=>$b->pk_boletin,
          'fk_periodo'=>$this->pk_periodo
        ]);
      }
    } 
  }
}
