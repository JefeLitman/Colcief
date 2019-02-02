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
    
    //By Paola
    /**
     * Esta funcion es llamada cuando se crea una division nueva.
     * 
     * La funcion crea todas las tuplas de notas_division que debe tener cada estudiante
     * por cada materia que tenga. Ya que aqui se guarda la nota que saca ese estudiante 
     * en esa division.
     */
    public function crearNotasDivision(){
      $notasPeriodo=NotaPeriodo::join('periodo','nota_periodo.fk_periodo','=','periodo.pk_periodo')->where('periodo.ano',date('Y'))->get();
      foreach ($notasPeriodo as $i) {
        NotaDivision::create(['fk_division'=>$this->pk_division,'fk_nota_periodo'=>$i->pk_nota_periodo]);
      }
    }

    //By Paola
    /**
     * Esta funcion es llamada cuando una division es eliminada o el porcentaje de esta 
     * es modificado. Ya que cuando el porcentaje de una division cambia el computa de 
     * todas las division genera una nota diferente y esto es lo que debe ser actualizado.
     * Pasando lo mismo cuando se elimina una division.
     * 
     * Actualiza la nota que se encuentra almacenada en Nota periodo.
     * Esta funcion es llamada de varias zonas, pero en especifico de la
     * funcion actualizarNota() de la clase NotaDivision. Y esta a su vez es llamada de
     * otra... todo esto en forma de cascada para que las notas guardadas en la DB sean
     * consistentes.
     */
    public function actualizarNotasPeriodo(){
      //Se actualizan todas las tuplas de el actual año en la tabla nota periodo
      $periodos=NotaPeriodo::select('nota_periodo.*')->join('periodo','nota_periodo.fk_periodo','=','periodo.pk_periodo')->where('periodo.ano',date('Y'))->get();
      foreach ($periodos as  $p) {
        $p->actualizarNota();
      }
    }
}
