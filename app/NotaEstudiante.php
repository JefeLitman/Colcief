<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\NotaDivision;

class NotaEstudiante extends Model
{
    protected $table = 'nota_estudiante';
    protected $primaryKey = 'pk_nota_estudiante';
    protected $guarded=[];

    public function nota()
    {
      return $this->belongsTo('App\Nota','fk_nota','pk_nota');
    }

    public function estudiante()
    {
      return $this->belongsTo('App\Estudiante','fk_estudiante','pk_estudiante');
    }

    public function notaPeriodo()
    {
      return $this->belongsTo('App\NotaPeriodo','fk_nota_periodo','pk_nota_periodo');
    }

    //By Paola
    /**
     * Actualiza la nota que se encuentra almacenada en Nota estudiante.
     * Es es el comienzo de una actualizacion en cascada de la estructura de datos que
     * guardan las notas en la DB. Actualizando a su paso las notas de nota_division,
     * nota_periodo y la nota de materia_boletin.
     */
    public function actualizarNota(){
      $d=NotaDivision::where("pk_nota_division",$this->fk_nota_division)->get();
      if (!empty($d[0])) {
        $d[0]->actualizarNota();
      }
    }

}
