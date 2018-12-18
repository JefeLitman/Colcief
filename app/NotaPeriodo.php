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

    public function actualizarNota(){
      $divs=NotaDivision::select("nota_division.nota_division","division.porcentaje")->where("fk_nota_periodo",$this->pk_nota_periodo)->join("division","nota_division.fk_division","=","division.pk_division")->get();
      $this->nota_periodo=0;
      foreach ($divs as $d) {
        $this->nota_periodo+=(($d->nota_division*$d->porcentaje)/100);
      }
      $this->save();
      MateriaBoletin::where("pk_materia_boletin",$this->fk_materia_boletin)->get()[0]->actualizarNota();
    }
    
}
