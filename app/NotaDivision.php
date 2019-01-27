<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\NotaEstudiante;
use App\NotaPeriodo;

class NotaDivision extends Model
{
    protected $table = 'nota_division';
    protected $primaryKey = 'pk_nota_division';
    protected $fillable = ['pk_nota_division','fk_division','fk_nota_periodo','nota_division'];

    public function actualizarNota(){
        $notas=NotaEstudiante::select("nota.porcentaje","nota_estudiante.nota")->where("nota_estudiante.fk_nota_division",$this->pk_nota_division)->join("nota","nota_estudiante.fk_nota","=","nota.pk_nota")->get();
        $this->nota_division=0;
        foreach ($notas as $n) {
            $this->nota_division+=(($n->nota*$n->porcentaje)/100);
        }
        $this->nota_division=round($this->nota_division, 1,PHP_ROUND_HALF_UP);  //Redondeo
        $this->save();
        NotaPeriodo::where("pk_nota_periodo",$this->fk_nota_periodo)->get()[0]->actualizarNota();
    }
}
