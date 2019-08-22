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
    protected $signature = 'stock_refresh';

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
        $xml_response_obj = $this->bridgeObject->allProducts();        
        $xml_response = $xml_response_obj->getContents();
        $xml = simplexml_load_string($xml_response);
        if (!empty($xml) && !isset($xml->ErrorCode)) {
            foreach ($products->Product as $curr_product){
                foreach ($curr_product->Clrs->Clr as $curr_color){
                    foreach ($curr_color->SKUs->SKU as $curr_sku){
                        $stock =$curr_sku->FreeStock;
                        $sku_idx = $curr_sku->Id;
                        echo "$sku_idx - $stock \n <br>";
                    }
                }
            }
        }
    }
}
