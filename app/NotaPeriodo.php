<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\NotaDivision;
use App\MateriaBoletin;

class NotaPeriodo extends Model
{
    protected $table = 'nota_periodo';
    protected $primaryKey = 'pk_nota_periodo';
    protected $fillable = ['pk_nota_periodo','fk_periodo','fk_materia_boletin','nota_periodo','habilidad'];

    public function notasEstudiantes()
    {
      return $this->hasMany('App\NotaEstudiante','fk_nota_periodo','pk_nota_periodo');
    }

    public function MateriaBoletin()
    {
      return $this->belongsTo('App\MateriaBoletin','fk_materia_boletin','pk_materia_boletin');
    }

    //By Paola
    /**
     * Actualiza la nota que se encuentra almacenada en Nota periodo.
     * Esta funcion es llamada de varias zonas, pero en especifico de la
     * funcion actualizarNota() de la clase NotaDivision. Y esta a su vez es llamada de
     * otra... todo esto en forma de cascada para que las notas guardadas en la DB sean
     * consistentes.
     */
    public function actualizarNota(){
      $divs=NotaDivision::select("nota_division.nota_division","division.porcentaje")->where("fk_nota_periodo",$this->pk_nota_periodo)->join("division","nota_division.fk_division","=","division.pk_division")->get();
      $this->nota_periodo=0;
      foreach ($divs as $d) {
        $this->nota_periodo+=(($d->nota_division*$d->porcentaje)/100);
      }
      $this->nota_periodo=round($this->nota_periodo, 1,PHP_ROUND_HALF_UP);  //Redondeo
      $this->save();
      MateriaBoletin::where("pk_materia_boletin",$this->fk_materia_boletin)->get()[0]->actualizarNota();
    }
    
}
