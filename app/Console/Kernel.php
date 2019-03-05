<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        /*/          ->hourly(); 
        /$schedule->command('users:icontact')
                 ->everyFiveMinutes();
                 */
        switch (env("APP_ENV")):
            case 'production':
                $schedule->command('algolia:sync')
                    ->daily();    
                $schedule->command('s7_transfer_product_tables')                                    
                    ->cron('35 2 * * *');       
                break;
            /*case 'dev' :                 
                break;*/                
        endswitch;
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
