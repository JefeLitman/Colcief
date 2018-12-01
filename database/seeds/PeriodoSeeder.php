<?php

use Illuminate\Database\Seeder;
use App\Periodo;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 5; $i++) { 
            Periodo::create([
                "fecha_inicio"=>date("Y-m-d"),
                "fecha_limite"=>date("Y-m-d"),
                "ano"=>date("Y"),
                "nro_periodo"=>$i
            ]);
        }
    }
}
