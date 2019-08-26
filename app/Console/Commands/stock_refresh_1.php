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
        
        $variant_collection=Variant::where('season','Current')
                        ->select('id','season','stock')->get();
        //print_r($variant_collection);
        //echo "\n ---- \n stock=";
        //echo count(collect($variant_collection)->where("id","333051")); //->pluck('stock')[0]);
        //exit;
        /*
        echo "\n0 Start : ".date('Y-m-d H:i:s');
        $prod_xml = $this->bridgeObject->allProducts();
        //$prod_xml = $this->bridgeObject->getProduct('28742');
        Storage::disk('public')->put('ap21product/data.xml', $prod_xml); 
        echo "\n 1 store XML to File : ".date('Y-m-d H:i:s');        
        */

        $xml_response_obj =  Storage::disk('public')->get('ap21product/data.xml');                             
        echo "\n 2 Read File : ".date('Y-m-d H:i:s');        

        if (!empty($xml_response_obj)) {            
            echo "\n 3 Got Content : ".date('Y-m-d H:i:s');				            
            $xml = simplexml_load_string($xml_response_obj);
            echo "\n 4 Created array : ".date('Y-m-d H:i:s');		
            if (!empty($xml) && !isset($xml->ErrorCode)) {
                Ap21_stock::truncate();                
                $records=array();
                $cnt=1;
                foreach ( $xml->Product as $curr_product){
                    foreach ($curr_product->Clrs->Clr as $curr_color){                    
                        foreach ($curr_color->SKUs->SKU as $curr_sku){                                                         
                            $id=(string) $curr_sku->Id;
                            $freestock=(string) $curr_sku->FreeStock;                            
                            $variant=collect($variant_collection)->where("id",$id);
                            if(isset($variant) and count($variant)>0){
                                $variant_stock=$variant->pluck('stock')[0];
                                print_r($variant);                                
                                if($variant_stock != $freestock){
                                    echo "\n $variant_stock - $freestock";
                                    $records[]=array('skuidx'=>$id,'stock'=>$freestock); 
                                       
                                    //exit;
                                }
                            }                                                    
                        }                                                                                  
                    }
                }
                print_r(count($records));
                exit;
                Ap21_stock::insert($records); 
                echo "\n 5 ap21_stock created ".date('Y-m-d H:i:s');
                
                $result=DB::table('p_variants')                        
                        ->join('ap21_stock', 'p_variants.id', '=', 'ap21_stock.skuidx')                        
                        ->where('p_variants.season','Current') 
                        //->where('p_variants.stock','!=',DB::raw("`ap21_stock`.`stock`"))                         
                        ->update([ 'p_variants.stock' => DB::raw("`ap21_stock`.`stock`") ]);                        
                echo "\n Result = ";
                print_r($result);

                echo "\n 6 p_variants updated ".date('Y-m-d H:i:s');
                
                
            }            
            echo "\n 7 Over. ".date('Y-m-d H:i:s');
        }
        else{
            echo "\n xml_response_obj is empty";
        }        
    }
}
