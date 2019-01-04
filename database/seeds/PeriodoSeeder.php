<?php

use Illuminate\Database\Seeder;
use App\Periodo;

class PeriodoSeeder extends Seeder {
    public function run(){
        Periodo::create([
            "fecha_inicio"=>date('Y').'-02-03',
            "fecha_limite"=>date('Y').'-04-01',
            "recuperacion_inicio"=>date('Y').'-04-02',
            "recuperacion_limite"=>date('Y').'-04-10',
            "ano"=>date('Y'),
            "nro_periodo"=> '1'
        ]);

        Periodo::create([
            "fecha_inicio"=>date('Y').'-04-11',
            "fecha_limite"=>date('Y').'-06-13',
            "recuperacion_inicio"=>date('Y').'-06-14',
            "recuperacion_limite"=>date('Y').'-06-21',
            "ano"=>date('Y'),
            "nro_periodo"=> '2'
        ]);

        Periodo::create([
            "fecha_inicio"=>date('Y').'-06-22',
            "fecha_limite"=>date('Y').'-08-03',
            "recuperacion_inicio"=>date('Y').'-08-04',
            "recuperacion_limite"=>date('Y').'-08-11',
            "ano"=>date('Y'),
            "nro_periodo"=> '3'
        ]);

        Periodo::create([
            "fecha_inicio"=>date('Y').'-08-12',
            "fecha_limite"=>date('Y').'-10-03',
            "recuperacion_inicio"=>date('Y').'-10-03',
            "recuperacion_limite"=>date('Y').'-10-10',
            "ano"=>date('Y'),
            "nro_periodo"=> '4'
        ]);
    }
}
