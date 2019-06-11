<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class Refreshversioncss extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refresh:version';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh versions of css';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Cache::forget('css_version_number');
        Cache::rememberForever('css_version_number', function () {
            return time();
        });
    }
}
