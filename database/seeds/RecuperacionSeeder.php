<?php

use Illuminate\Database\Seeder;
use App\Periodo;

class RecuperacionSeeder extends Seeder
{
    public function run()
    {   
        $periodos = Periodo::where('ano',date('Y'))->get();
        foreach ($periodos as $p) {
            $p->crearRecuperaciones();
        }
    }
}
