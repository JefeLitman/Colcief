<?php

namespace App\Console\Commands;
use App\Fecha;

use Illuminate\Console\Command;

class ano_limite extends Command {

    protected $signature = 'ano:limite';

    protected $description = 'Command description';

    public function __construct(){
        parent::__construct();
        $this -> hoy = date('Y-m-d');
    }

    public function handle(){
        $fechas = Fecha::where('ano', date('Y')) -> where('fin_escolar', $this -> hoy) -> get();
        error_log($fechas);
        foreach ($fechas as $fecha) {
            Fecha::verificarBoletines();
        }
    }
}
