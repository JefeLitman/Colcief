<?php

use Illuminate\Database\Seeder;
use App\Fecha;

class FechaSeeder extends Seeder{
    public function run(){
        $fecha = new Fecha;
        $fecha -> inicio_escolar = date('Y-m-d');
        $fecha -> fin_escolar = '2019-11-30';
        $fecha -> ano = '2018';
        $fecha -> save();
    }
}
