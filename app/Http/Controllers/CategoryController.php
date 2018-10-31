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
        return view( 'customer.categorylower', compact('products', 'styles','filters','prod_type','gender','flag_bra') );
    }

    public function womens_landing(){
        return view('customer.mens-running-shoes-and-clothing');
    }
    public function mens_landing(){
        return view('customer.womens-running-shoes-and-clothing');
    }
    
    public function shoes_category(){
        $page_url = explode('/',$_SERVER['REQUEST_URI']);
        $page_info = $this->get_page_info($page_url[1]);
        $category_array = explode('-',$page_url[1]);
        $category = $category_array[0];
        if($category=='cross'){
            $category = 'x-training';
        }
        $shoes_category_product = $this->get_shoes_category_product($category);
        
        return view('customer.shoes-category', compact('category','page_info','shoes_category_product') );
    }

    public function shoes_detail($shoe_type=''){
        //$shoe_name=strtolower($shoe_name);
        $common_template=array("glycerin","adrenaline-gts","ghost","transcend","launch","aduro","revel","ravenna","beast","ariel","hyperion","neuro","asteria","addiction","purecadence","pureflow","mazama","cascadia","cascadia-gtx","ghost-gtx","puregrit","caldera","vapor","defyance","dyad","adrenaline-asr","ricochet","levitate","bedlam");
        if (in_array($shoe_type,$common_template)){    
            $shoe_info = shoe_mast::where(['shoe_type'=> $shoe_type])->first();
            
            
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

    public static function get_seo_name($style, $color_code, $gen) {
        $prod_info = product::where(
            [
                ['color_code', '=', $color_code],
                ['style', '=', $style],
            ]
        )->whereIn('gender', array($gen,'Unisex'))        
        ->whereHas('variants' , function($query)  {
            return $query->where('visible', '=', 'Yes');
        })->first();
        if ($prod_info) return $prod_info->seo_name;
    }

    public function get_page_info($page_url = ''){
        $page_url .= '/';
        $shoe_info = seo::where(['page_url'=> $page_url])->first();
        $cnt = seo::where(['page_url'=> $page_url])->count();
        if($cnt > 0){
            $page_info = array(
                "title" => $shoe_info->title_tag,
                "meta_description" => $shoe_info->meta_description, 
                "keywords" => $shoe_info->keywords,
                "header_h1" => $shoe_info->header_h1, 
                "header_text" => $shoe_info->header_text, 
                "footer_h2" => $shoe_info->footer_h2, 
                "footer_text" => $shoe_info->footer_text
            );

            return $page_info;
        }else{
            return false;
        }

    }

    public function get_shoes_category_product($category){
        $result = Shoe_mast::where('category',$category)->get();
        return $result;
    }


}
