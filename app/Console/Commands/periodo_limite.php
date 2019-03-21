<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Periodo;

class periodo_limite extends Command {

    protected $signature = 'periodo:limite';
    protected $description = 'Command description';
    
    public function __construct(){
        parent::__construct();
        $this -> hoy = date('Y-m-d');
    }

    public function handle(){
        $periodos = Periodo::where('ano', date('Y')) -> where('fecha_limite', $this -> hoy) -> get();
        foreach ($periodos as $periodo) {
            $periodo -> crearRecuperaciones();
        }
    }
}
