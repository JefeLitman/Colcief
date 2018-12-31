<?php

use Illuminate\Database\Seeder;
use App\Periodo;

class PeriodoSeeder extends Seeder {
    public function run(){
        $j=0;
        for ($i=1; $i < 12; $i=$i+3) {
            $j++;
            Periodo::create([
                "fecha_inicio"=>date('Y').'-'.$i.'-03',
                "fecha_limite"=>date('Y').'-'.$i.'-28',
                "ano"=>date('Y'),
                "nro_periodo"=>$j
            ]);
        }
    }
}
