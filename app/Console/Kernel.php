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
        switch (env("APP_ENV")):
            case 'production':
                $schedule->command('s7_transfer_product_tables')                                    					
                    ->cron('55 2 * * *');       
                $schedule->command('s8_SendStatusEmail')                                    					
                    ->cron('00 3 * * *');       
                $schedule->command('algolia:sync')
                    ->cron('05 3 * * *'); 
                $schedule->command('stock_refresh')
                    ->hourly()
                    ->between('5:00', '22:00');
                $schedule->command('medibank-export')->tuesdays()->at('8:00');                   
                break;        
            /*case 'dev' : 
              case 'staging' : 
                break; */
           
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
