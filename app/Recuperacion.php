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
    
    //By Paola
    /**
     * Esta funcion debe ejecutarse cuando se modifique la nota que se guarde en
     * $this->nota.
     * Debe actualizarse ya que la definitiva de la materia debe considerar las notas que se
     * saquen en las recuperaciones realizadas. 
     * Especificamente las nota de la nota de la recuperacion debe estar entre 1.0 y 3.0 
     * ademas si la nota de la recuperacion es mayor que la nota del periodo, la nota de la 
     * recuperacion es la que se tendra en cuenta para la definitiva de ser lo contrario la
     * nota que se computaria sería la nota del periodo de la materia.
     */
    public function actualizarNotaMateria(){ 
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
