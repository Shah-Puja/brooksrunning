<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shoe_mast;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index($category) {
        $cat_info= \App\Models\Category::where('slug',$category)->first();
        if ($cat_info->count() < 1) {
            abort(404);
        }else{
            $gender = $cat_info->gender;            
            $prod_type = $cat_info->prod_type;
            $depth = $cat_info->depth; 
            if($depth=='2'){
                $products = \App\Models\Category::getProducts_main($gender,$prod_type);
            }elseif($depth=='3'){
                $products = \App\Models\Category::getProducts($category);
            }
            
            if ($products->count() < 1) {
                $styles=$flag_bra="";              
                $filters=[];  
            }
            else{
                $styles = $products->unique('style');                                
                $filters = \App\Models\Category::provideFilters($products,$prod_type);                
            }            
            return view( 'customer.categorylower', compact('products','styles','filters','prod_type','gender') );                
        }
    }
    public function index_trunal($category) {

        $products = \App\Models\Category::getProducts($category);

        if ($products->count() < 1) {
            abort(404);
        }

        $styles = $products->unique('style');

        $prod_type = $products->pluck('prod_type')->first();
        $flag_bra = ($category=='womens-sports-bras') ? 'Yes' : 'No';
        $gender = $products->pluck('gender')->first();
        $filters = \App\Models\Category::provideFilters($products,$prod_type,$flag_bra);

        //echo "<hr><pre>";
        //print_r($products);
        //echo "</pre>";
        //exit;

        return view( 'customer.categorylower', compact('products', 'styles','filters','prod_type','gender','flag_bra') );
    }

    public function womens_landing(){
        return view('customer.mens-running-shoes-and-clothing');
   }
   public function mens_landing(){
    return view('customer.womens-running-shoes-and-clothing');
    }
    public function shoes_category(){
        return view('customer.shoes-category');
    }
    public function shoe_main(){
        return view('customer.shoe-main');
    }

    public function neutral_running_shoes(){
        return view('customer.neutral-running-shoes');
    }
    public function support_running_shoes(){
        return view('customer.support-running-shoes');
    }
    public function trail_running_shoes(){
        return view('customer.trail-running-shoes');
    }
    public function competition_running_shoes(){
        return view('customer.competition-running-shoes');
    }
    public function cross_trainer_shoes(){
        return view('customer.cross-trainer-shoes');
    }
    public function walking_shoes(){
        return view('customer.walking-shoes');
    }

    public function shoes_detail($shoe_name=''){

        if ($shoe_name == "glycerin" || $shoe_name == "adrenaline-gts" || $shoe_name == "ghost" || 
            $shoe_name == "transcend" || $shoe_name == "launch" || $shoe_name == "aduro" || $shoe_name == "revel" ||
            $shoe_name == "ravenna" || $shoe_name == "beast" || $shoe_name == "ariel" || $shoe_name == "hyperion" ||
            $shoe_name == "neuro" || $shoe_name == "asteria" || $shoe_name == "addiction" || $shoe_name == "purecadence" ||
            $shoe_name == "pureflow" || $shoe_name == "mazama" || $shoe_name == "cascadia" || $shoe_name == "cascadia-gtx" ||
            $shoe_name == "ghost-gtx" || $shoe_name == "puregrit" || $shoe_name == "caldera" || $shoe_name == "vapor" ||
            $shoe_name == "defyance" || $shoe_name == "dyad" || $shoe_name == "adrenaline-asr" || $shoe_name == "ricochet" 
            || $shoe_name == "levitate" || $shoe_name == "bedlam") {

                if ($shoe_name == "adrenaline-gts" || $shoe_name == "cascadia-gtx" || $shoe_name == "ghost-gtx") {
                    if (strpos($shoe_name, '-') !== false) {
                        $shoename = explode("-",$this->get_str_conv_upper($shoe_name));
                        $shoe_name = implode(" ",$shoename);

                    }
                }
        
            $shoe_info = shoe_mast::where(['shoe_name'=> $shoe_name])->first();
            
            
            if($shoe_info->shop_men != ''){
				$shop_m = explode('_', $shoe_info->shop_men);
                $seo_name = $this->get_seo_name($shop_m['0'],$shop_m['1'],'m');
				if($seo_name != ''){
                    $shop_men_url = $seo_name."/".$shoe_info->shop_men.".html";
				}
            }

            if($shoe_info->shop_women != ''){
				$shop_w = explode('_', $shoe_info->shop_women);
                $seo_name = $this->get_seo_name($shop_w['0'],$shop_w['1'],'w');
				if($seo_name != ''){
                    $shop_women_url = $seo_name."/".$shoe_info->shop_women.".html";
				}
            }
            
            return view('customer.shoe-main', compact('shoe_info','shop_women_url','shop_men_url') );

        }
        
    }

    public function get_str_conv_upper($shoe_name = "") {
        $shoe_name_arr = explode('-', $shoe_name);
        $shoe_name_arr_final = array();
        foreach ($shoe_name_arr as $shoe_key => $shoe_arr) {
            if ($shoe_key == 0) {
                $shoe_name_arr_final[] = $shoe_arr;
            } else {
                $shoe_name_arr_final[] = (strlen($shoe_arr) < 4) ? strtoupper($shoe_arr) : $shoe_arr;
            }
        }
        $shoe_name = implode('-', $shoe_name_arr_final);
        return $shoe_name;
    }

    public function get_seo_name($style, $color_code, $gen) {
        $prod_info = product::where(
            [
                ['color_code', '=', $color_code],
                ['style', '=', $style],
            ]
        )->orwhere(
            [
                ['gender', '=', $gen],
                ['gender', '=', 'Unisex'], 
            ]
        )->first();
    
        return $prod_info->seo_name;
    }
}
