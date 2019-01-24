<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Boletin;

class Fecha extends Model {
    protected $table = 'fecha';
    protected $primaryKey = 'pk_fecha';
    protected $fillable = ['pk_fecha', 'inicio_escolar','fin_escolar', 'ano'];  

    public static function verificarBoletines(){
        $boletines=Boletin::where('ano',date('Y'))->get();
        foreach ($boletines as $b) {
            $b->verificar();
        }
    }
}
