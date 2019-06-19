<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\Order;

class MedibankOrderCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'medibank-order-csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Medibank Order csv';

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
        
    }
}
