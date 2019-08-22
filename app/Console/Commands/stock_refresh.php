<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\SYG\Bridges\BridgeInterface as Bridge;

class stock_refresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stock-refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh web stock from Ap21 ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Bridge $b) {
        $this->bridgeObject = $b;
        parent::__construct();
    }
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo "Hi";
        $xml_response = $this->bridgeObject->allProducts();
        print_r($xml_response);
    }
}
