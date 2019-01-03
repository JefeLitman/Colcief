<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {

    protected $commands = [
        Commands\ano_inicio::class,
        Commands\escolar_inicio::class,
        Commands\periodo_fin::class,
    ];

    protected function schedule(Schedule $schedule){
        // $schedule->command('ano:fin')->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
