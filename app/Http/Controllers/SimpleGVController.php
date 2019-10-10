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
                echo $value->gv."<br>";
                echo $value->pin;
                exit;
                $response=$this->bridge->vouchervalid($value->gv,$value->pin,'100');    
                if($response!=''){
                    $returnCode = $response->getStatusCode();    
                    switch ($returnCode) {
                            case 200:   
                               echo "No";     
                                $value->used="No";
                                $value->save();
                                break;
                            default:
                            echo "Yes";  
                                $value->used="Yes";
                                $value->save();
                                break;
                    }
                }
            }
       }
       
    } 
}
