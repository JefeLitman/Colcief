<?php

use Illuminate\Database\Seeder;
use App\Periodo;

class RecuperacionSeeder extends Seeder
{
    public function run()
    {   
        $periodos = Periodo::where('ano',date('Y'))->get();
        foreach ($periodos as $p) {
            error_log("Creacion notas recuperacion Periodo: ".$p->nro_periodo);
            $p->crearRecuperaciones();
        }
    }
}
