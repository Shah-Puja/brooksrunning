<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\SYG\Bridges\BridgeInterface as Bridge;
use Illuminate\Support\Facades\Storage;
use App\Models\Ap21_stock;
use App\Models\Variant;
use Illuminate\Support\Facades\DB; 

class stock_refresh_2 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stock_refresh_2';

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
                // make collection  of variant table with id,stock,visible where season='Current' 
                // Insert record in array only if ap21_stock!=variant_stock
                Ap21_stock::truncate();                
                $records=array();
                $cnt=1;
                foreach ( $xml->Product as $curr_product){
                    foreach ($curr_product->Clrs->Clr as $curr_color){                    
                        foreach ($curr_color->SKUs->SKU as $curr_sku){
                            //print_r($curr_sku);
                            $ap21_stock =$curr_sku->FreeStock;
                            $ap21_skuidx = $curr_sku->Id;
                            //echo "\n Skuidx =  $ap21_skuidx | Stock = $ap21_stock -";
                            $variant = Variant::find($ap21_skuidx)->where('season','current')->first();                            
                            //where(stock != ap21_stock) 
                            if ($variant){    
                                if($ap21_stock<=0){
                                    $records[]=['skuidx'=>$ap21_skuidx,'stock'=>$ap21_stock,'visible'=>'No'];
                                }
                                else{
                                    $records[]=['skuidx'=>$ap21_skuidx, 'stock'=>$ap21_stock,'visible'=>'Yes'];
                                }
                                //echo "\n".$cnt++." = ".$variant->id."-".$variant->stock."-".$variant->visible;
                                //if ()
                                //print_r($variant);
                                //exit;    
                            }                          
                            //$records[]=['skuidx'=>$curr_sku->Id,'stock'=>$curr_sku->FreeStock];
                        }
                        //exit;
                    }
                }
                Ap21_stock::insert($records); 
                echo "\n 5 ap21_stock created ".date('Y-m-d H:i:s');
                /*
                DB::table('p_variants as a')
                        ->join('ap21_stock as b', 'a.id', '=', 'b.skuidx')                        
                        ->update([ 'a.stock' => DB::raw("`b`.`stock`") ]);
                echo "\n 6 p_variants updated ".date('Y-m-d H:i:s');
                */
                
            }            
            echo "\n 7 Over. ".date('Y-m-d H:i:s');
        }
        else{
            echo "\n xml_response_obj is empty";
        }        
    }
}
