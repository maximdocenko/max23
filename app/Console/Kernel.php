<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\SendEmail::class,
        Commands\SendSMS::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('email:send')->daily();
        $schedule->command('sms:send')->daily();
    }
}