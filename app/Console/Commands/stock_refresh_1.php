<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\SYG\Bridges\BridgeInterface as Bridge;
use Illuminate\Support\Facades\Storage;
use App\Models\Ap21_stock;
use App\Models\Variant;
use Illuminate\Support\Facades\DB; 

class stock_refresh_1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stock_refresh_1';

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
        echo "\n0 Start : ".date('Y-m-d H:i:s');     
        
        $prod_xml = $this->bridgeObject->allProducts();
        //$prod_xml = $this->bridgeObject->getProduct('28742');
        Storage::disk('public')->put('ap21product/data.xml', $prod_xml); 
        echo "\n1 store XML to File : ".date('Y-m-d H:i:s');  
        
        $variant_collection=Variant::where('season','Current')
                        ->select('id','season','stock')->get();
        $stock_collection = $variant_collection->mapWithKeys(function ($item) {
                            return [$item['id'] => $item['stock']];
                        });                     
        echo "\n2 Generated variant_collection at ".date('Y-m-d H:i:s');                                               

        $xml_response_obj =  Storage::disk('public')->get('ap21product/data.xml');                             
        echo "\n3 Read File : ".date('Y-m-d H:i:s');        

        if (!empty($xml_response_obj)) {                        
            $xml = simplexml_load_string($xml_response_obj);
            echo "\n 4 Created XML object : ".date('Y-m-d H:i:s');		
            if (!empty($xml) && !isset($xml->ErrorCode)) {                
                $records=array();
                $cnt=0;$msg="";
                foreach ( $xml->Product as $curr_product){
                    foreach ($curr_product->Clrs->Clr as $curr_color){                    
                        foreach ($curr_color->SKUs->SKU as $curr_sku){                                                         
                            $id=(string) $curr_sku->Id;
                            $freestock=(string) $curr_sku->FreeStock;                                                                                    
                            if(isset($stock_collection[$id])){
                                $variant_stock=$stock_collection[$id];                                
                                if($variant_stock != $freestock){                                         
                                    $visible=($freestock>0)? "Yes" : "No";
                                    $msg.="# $id |variant_stock = $variant_stock | Free_stock = $freestock | $visible";
                                    Variant::where('id',$id)->update(['stock'=>$freestock,'visible'=>$visible]);
                                    $cnt++;
                                }
                            }                                                    
                        }                                                                                  
                    }
                }
                echo "\n $cnt Records got updated \n$msg ";
                echo "\n5 Completed at ".date('Y-m-d H:i:s');
                DB::table('Ap21_stock_log')->insert(
                    ['list' => $msg, 'update_cnt' => $cnt]
                );                                                
            }                        
        }
    }
}
