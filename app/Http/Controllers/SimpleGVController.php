<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SimpleGv;
use App\SYG\Bridges\BridgeInterface;

class SimpleGVController extends Controller
{  
    public function __construct(BridgeInterface $bridge)
	{
        $this->bridge = $bridge;
    }
    public function gv_check(){
       $simplegv = SimpleGv::where('used','No')->get();
       if($simplegv!=''){
            foreach($simplegv as $value){
                $response=$this->bridge->vouchervalid($value->gv,$value->pin,'100');    
                $returnCode = $response->getStatusCode();    
                    switch ($returnCode) {
                            case 200:        
                                $value->used="NO";
                                $value->save();
                                break;
                            default:
                                $value->used="Yes";
                                $value->save();
                                break;
                        } 
            }
       }
       
    } 
}
