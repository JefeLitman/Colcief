<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\NotaPeriodo;
use App\MateriaBoletin;

class Recuperacion extends Model
{
    protected $table = 'recuperacion';
    protected $primaryKey = 'pk_recuperacion';
    protected $guarded = [];
    
    public function actualizarNotaMateria(){ //By Paola
        $notaPeriodo=NotaPeriodo::where('pk_nota_periodo',$this->fk_nota_periodo)->get();
        if(!empty($notaPeriodo[0])){
            $notaPeriodo=$notaPeriodo[0];
            $materia=MateriaBoletin::where('pk_materia_boletin',$notaPeriodo->fk_materia_boletin)->get();
            if(!empty($materia[0])){
                $materia=$materia[0];
                if( $notaPeriodo->nota_periodo < $this->nota  and  $this->nota <= 3 ){
                    $notas=NotaPeriodo::where('fk_materia_boletin',$materia->pk_materia_boletin)->get();
                    $materia->nota_materia=0;
                    foreach ($notas as $n) {
                        if ($n->pk_nota_periodo == $this->fk_nota_periodo) {
                            $materia->nota_materia=$materia->nota_materia+$this->nota;
                        }else{
                            $materia->nota_materia=$materia->nota_materia+$n->nota_periodo;
                        }
                    }
                    $materia->nota_materia=$materia->nota_materia/4;
                    $materia->nota_materia=round($materia->nota_materia, 1, PHP_ROUND_HALF_UP);
                    $materia->save();
                }
            }
        }
    }
}
