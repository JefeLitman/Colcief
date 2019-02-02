<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Boletin;

class Fecha extends Model {
    protected $table = 'fecha';
    protected $primaryKey = 'pk_fecha';
    protected $fillable = ['pk_fecha', 'inicio_escolar','fin_escolar', 'ano'];  

    //By Paola
    /**
     * Se encarga de verificar todos los boletines, es decir revisar que estudiantes perdieron
     * y aprovaron, considerando unicamente las notas. (Lo que no considera son las inasistencias)
     * 
     * Y a su paso genera las tuplas nivelaciones si se da el caso.
     * 
     * Cambio: Ahora solo revisara los boletines no analizados, ya que unicamente se pondra el estado
     * aqui, y en una vista que realizara douglas la cual permitira al coordinador dar por perdido un
     * año a causa de inasistencias. Linea agregada: ['estado','i']
     */
    public static function verificarBoletines(){
        $boletines=Boletin::where([['ano',date('Y')],['estado','i']])->get();
        foreach ($boletines as $b) {
            $b->verificar();
        }
    }
}
