<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shoe_mast;
use App\Models\Product;
use App\Models\Shoe_specs;
use App\Models\Seo;

class CategoryController extends Controller
{
    public function index($category) {
        $cat_info= \App\Models\Category::where('slug',$category)->firstOrFail();

        $gender = $cat_info->gender;            
        $prod_type = $cat_info->prod_type;
        $depth = $cat_info->depth;
        $name = $cat_info->name; 
            if($depth=='2'){
                $products = \App\Models\Category::getProducts_main($gender,$prod_type,$name);
            }elseif($depth=='3'){
                $products = \App\Models\Category::getProducts($category);
            }
            
            if (empty($products)) {
                $styles=$flag_bra="";              
                $filters=[];  
            }
            else{
                $styles = $products->unique('style');                                
                $filters = \App\Models\Category::provideFilters($products,$prod_type,$gender,$depth);                
            }            
        return view( 'customer.categorylower', compact('products','styles','filters','prod_type','gender') );                
    
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

        //NEW ARRIVALS
        $shoe_info = array('120279_596','120272_585','120284_450','120287_531');
        $shoes_product=[];
        foreach($shoe_info as $item){
            $slider_shoe = explode('_', $item); 
            $shoes_product[] =  product::where(
                [
                    ['color_code', '=', $slider_shoe[1]],
                    ['style', '=', $slider_shoe[0]],
                ]
            )->with('variants')
            ->first();            
        }

        //NEW CLOTHING ARRIVALS
        $cloths_info = array('350037_052','221257_043','221296_524','220981_579');
        $cloths_product=[];
        foreach($cloths_info as $item){
            $slider_cloths = explode('_', $item); 
            $cloths_product[] =  product::where(
                [
                    ['color_code', '=', $slider_cloths[1]],
                    ['style', '=', $slider_cloths[0]],
                ]
            )->with('variants')
            ->first();            
        }

        return view('customer.womens-running-shoes-and-clothing',compact('shoes_product','cloths_product'));
    }
    public function mens_landing(){

        //NEW ARRIVALS
        $shoe_info = array('110290_689','110283_449','110294_010','110299_419');
        $shoes_product=[];
        foreach($shoe_info as $item){
            $slider_shoe = explode('_', $item); 
            $shoes_product[] =  product::where(
                [
                    ['color_code', '=', $slider_shoe[1]],
                    ['style', '=', $slider_shoe[0]],
                ]
            )->with('variants')
            ->first();            
        }

        //NEW CLOTHING ARRIVALS
        $cloths_info = array('211139_481','211133_330','211157_001','211135_047');
        $cloths_product=[];
        foreach($cloths_info as $item){
            $slider_cloths = explode('_', $item); 
            $cloths_product[] =  product::where(
                [
                    ['color_code', '=', $slider_cloths[1]],
                    ['style', '=', $slider_cloths[0]],
                ]
            )->with('variants')
            ->first();            
        }

        return view('customer.mens-running-shoes-and-clothing',compact('shoes_product','cloths_product'));
    }

    public function sale_landing(){
        return view('customer.running-shoes-and-apparel-sale');
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

        $diff_template=array("liberty","maximus","addiction-walker","dyad-walker");
        if (in_array($shoe_type,$diff_template)){ 
            $shoe_info = shoe_mast::where(['shoe_type'=> $shoe_type])->first();
            $shoe_specs = shoe_specs::where(['shoe_type'=> $shoe_type])->orderBy('seqno', 'asc')->get();
            $shoes_detail = $this->get_shoes_detail($shoe_type);
            $shoes_detail = array_filter($shoes_detail);
            return view('customer.shoe-main-new', compact('shoe_info','shoe_specs','shoes_detail') );
        }
        
    }
    public function get_shoes_detail($shoe_type){
        $result = shoe_mast::where(['shoe_type'=> $shoe_type])->get();
        $data 				= array();
		$prod_array 		= array();
		$trail_array 		= array();
		$kids_array 		= array();
		$prod_link_array	= array();
		$trail_link_array	= array();
		$kids_link_array	= array();
		$prod_link 			= ''; 
        foreach($result as $value){
            $data['shoe_type'] 	= $value['shoe_type'];
			$data['experience'] = $value['experience'];
			$data['keywords'] 	= $value['keywords'];
			$data['meta_desc'] 	= $value['meta_desc'];
			$data['description']= $value['description'];
			$data['page_title']= $value['page_title'];
			$data['video_link'] = $value['video_link'];
			$data['features'] 	= $value['features'];
			$data['feature_1'] 	= $value['feature_1'];
			$data['feature_2'] 	= $value['feature_2'];
			$data['feature_3'] 	= $value['feature_3'];
            $data['category'] 	= $value['category'];
            
            if($value['shop_men'] != ''){
				$shop_m = explode('_', $value['shop_men']);
				$seo_name = $this->get_seo_name($shop_m['0'],$shop_m['1'],'m');
				if(!empty($seo_name)){
					if($seo_name != ''){
						$data['shop_men'] = $seo_name."/".$value['shop_men'].".html";
					} else {
						$data['shop_men'] = $seo_name."/".$value['shop_men'].".html";
					}
				}
			}

			if($value['shop_women'] != ''){
				$shop_w = explode('_', $value['shop_women']);
				$seo_name = $this->get_seo_name($shop_w['0'],$shop_w['1'],'w');
				if(!empty($seo_name)){
					if($seo_name != ''){
						$data['shop_women'] = $seo_name."/".$value['shop_women'].".html";
					} else {
						$data['shop_women'] = $seo_name."/".$value['shop_women'].".html";
					}
				}
            }

            // print_r($value['prod_link']);echo "<br>";
            // exit;
            
            if(!empty($value['prod_link'])){
				
				$prod_link = explode(",", $value['prod_link']);
                $product=[];
				foreach ($prod_link as $p_link) {
					$prod  		=  explode("-", $p_link);
					@$style	= $prod[1];
					@$color_code = $prod[2];
                    $gender		= $prod[0];
                    if($gender == 'men'){
                        $gender = "M";
                    }
                    if($gender == 'women'){
                        $gender = "W";
                    }
                    
                    $product[] =  product::where(
                        [
                            ['color_code', '=', $color_code],
                            ['style', '=', $style],
                            ['gender', '=', $gender],
                        ]
                    )
                    ->whereHas('variants' , function($query)  {
                        return $query->where('visible', '=', 'Yes');
                    })->with('variants')
                    ->first();  	
                }  
                
                return $product;
			}
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

    public function orderfailed()
	{
        return view( 'customer.orderfailed');
    }

    public function bestselling($gender){
        $special_prod = \App\Models\Special_prod::where('prod_type','footwear')
                                ->where('category','Best Selling')
                                ->where('gender',$gender)
                                ->where('status','active')
                                ->first();
        if($special_prod){
            $prod_list = ($special_prod->prod_list!='') ? explode(",",$special_prod->prod_list) : '';
            if($prod_list!=''){
                $data_array = [];
                foreach($prod_list as $item){
                    $item = explode('=>',$item);
                    $style = $item[0];
                    $color_code = $item[1];
                    $data_array[] = array('style'=> $style,'color_code'=> $color_code);
                }
                $style_array = collect($data_array)->pluck('style');
                  
                $styles = \App\Models\Product::whereIn("style",$style_array)
                                    ->whereHas('variants', function ( $query ) {
                                          $query->where('visible', '=', 'Yes');
                                    })->get();
            
                $products = $styles->filter(function ($value, $key) use ($data_array) {
                    $data=[];
                          foreach($data_array as $value_array){
                             if($value_array['style']==$value->style && $value_array['color_code']==$value->color_code){
                                $data[] = $value;
                             }
                          }
                        return $data;
                })->unique('style');
               
                $colour_options = $styles->unique(function ($item){
                    return $item['style'].$item['color_code'];
                });

            } 
        }
        return view( 'customer.best_selling',compact('colour_options','products','gender'));
    }
    public function order_confirmation()
	{
		return view( 'emails.order-confirmation');
    }

}
