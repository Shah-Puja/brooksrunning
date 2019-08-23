<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\SYG\Bridges\BridgeInterface as Bridge;
use Illuminate\Support\Facades\Storage;
use App\Models\Ap21_stock;

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
        echo "\n1 Start : ".date('Y-m-d H:i:s');
        $prod_xml = $this->bridgeObject->allProducts();
        //$prod_xml = $this->bridgeObject->getProduct('28742');
        Storage::disk('public')->put('ap21product/data.xml', $prod_xml);        
        

        $xml_response_obj =  Storage::disk('public')->get('ap21product/data.xml');                     
        //echo "aa : \n ".$xml_response_obj;
        echo "\n2 Call Over : ".date('Y-m-d H:i:s');
        exit;

        if (!empty($xml_response_obj)) {
            //$bridge = $xml_response_obj->getContents();            
            echo "\n 3 Got Content : ".date('Y-m-d H:i:s');				            
            $xml = simplexml_load_string($xml_response_obj);
            echo "\n 4 Created array : ".date('Y-m-d H:i:s');		
            if (!empty($xml) && !isset($xml->ErrorCode)) {
                echo "Success";
                Ap21_stock::truncate();
                //exit;
                //foreach ( $xml->Product as $curr_product){
                    //foreach ($curr_product->Clrs->Clr as $curr_color){
                    foreach ($xml->Clrs->Clr as $curr_color){
                        foreach ($curr_color->SKUs->SKU as $curr_sku){
                            $stock =$curr_sku->FreeStock;
                            $skuidx = $curr_sku->Id;
                            echo "\n $skuidx - $stock";
                            Ap21_stock::create(['skuidx'=>$curr_sku->Id,'stock'=>$curr_sku->FreeStock]);
                            //exit;
                        }
                    }
                //}
            }            
            echo "\n 5 Complete ".date('Y-m-d H:i:s');
        }
        else{
            echo "\n xml_response_obj is empty";
        }
        
/*

        echo "\n1 Start : ".date('Y-m-d H:i:s');
        //$xml_response_obj = $this->bridgeObject->allProducts();
        $xml_response_obj = $this->bridgeObject->getProduct('206089');
        echo $xml_response_obj;
        exit;
		/*echo "\n2 Call Over : ".date('Y-m-d H:i:s');
        if ($xml_response_obj){
            $xml_response = $xml_response_obj->getContents();
            echo "\n 3 Got Content : ".date('Y-m-d H:i:s');				
            $xml = simplexml_load_string($xml_response);
            echo "\n 4 Created array : ".date('Y-m-d H:i:s');		
            if (!empty($xml) && !isset($xml->ErrorCode)) {
                //echo $xml->Product
                foreach ( $xml->Product as $curr_product){
                    foreach ($curr_product->Clrs->Clr as $curr_color){
                        foreach ($curr_color->SKUs->SKU as $curr_sku){
                            $stock =$curr_sku->FreeStock;
                            $skuidx = $curr_sku->Id;
                            echo "\n $sku_idx - $stock";
                            Ap21_stock::create(['skuidx'=>$curr_sku->Id,'stock'=>$curr_sku->FreeStock]);
                            exit;
                        }
                    }
                }
            }            
            echo "\n 5 Complete ".date('Y-m-d H:i:s');
        }
        else{
            echo "Error";
        
        }
        */
        

    }
}
