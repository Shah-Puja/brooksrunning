<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SYG\Bridges\BridgeInterface as Bridge;
use App\Models\Ap21_stock;


class TestController extends Controller
{
    public function __construct(Bridge $b) {
        $this->bridgeObject = $b;       
    }

    public function stockrefresh(){
        echo "Hi";
        echo "\n1 Start : ".date('Y-m-d H:i:s');
        $xml_response_obj = $this->bridgeObject->allProducts();
        //$xml_response_obj = $this->bridgeObject->getProduct('206089');
        print_r($xml_response_obj);
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
