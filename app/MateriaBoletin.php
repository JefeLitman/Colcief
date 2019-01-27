<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\NotaPeriodo;

class MateriaBoletin extends Model
{
    protected $table = 'materia_boletin';
    protected $primaryKey = 'pk_materia_boletin';
    protected $fillable = ['fk_materia_pc','fk_boletin','nota_materia','pk_materia_boletin'];

    public function actualizarNota(){
        $periodos=NotaPeriodo::select('nota_periodo')->where("fk_materia_boletin",$this->pk_materia_boletin)->get();
        $this->nota_materia=0;
        foreach ($periodos as $p) {
            $this->nota_materia+=$p->nota_periodo;
        }
        $this->nota_materia=$this->nota_materia/4; //Siempre son 4 periodos
        $this->nota_materia=round($this->nota_materia, 1,PHP_ROUND_HALF_UP);  //Redondeo
        $this->save();
    }
}
