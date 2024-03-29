<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Image;
use App\Models\Ap21_colour;
use App\SYG\Bridges\BridgeInterface;
use App\Mail\ProductAp21Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;

class ProductColourController extends Controller
{   
    protected $bridge;
    public function __construct(BridgeInterface $bridge) {
        $this->bridge = $bridge;
    }
    public function index($name,$style,$color,Request $request){
        // Cache benefit filenames to check file exist
        Cache::remember('benefits_image_list', 120, function() {        
            //Cache will get reset after every 2 hrs. If file is added then after 2 hrs it will get reflected on site (if cache is not cleared)
            return Storage::disk('sftp_benefit')->files('public_html/media/benefits/');            
        });
   
        if (env('APP_ENV') =='production' && env('AP21_STATUS') == 'ON' && !$request->ajax()) {
          //if (env('AP21_STATUS') == 'ON' && !$request->ajax()) {
            ///get product last updated
            $get_product_last_updated = Product::where('style',$style)
                                                ->with('variants')
                                                ->get();
            //print_r($get_product_last_updated);
            if (!empty($get_product_last_updated)) {
                    $product_last_updated =$get_product_last_updated->map(function($product) {
                        return $product->variants;
                    })->flatten()->pluck('updated_at')->max();

                    $all_style_idx =$get_product_last_updated->map(function($product) {
                        return $product->style_idx;
                    })->flatten()->unique();

                     //print_r($all_style_idx);
              
                if (!empty($product_last_updated)) {
                    $current_time = strtotime(Carbon::now()->toDateTimeString());
                    $last_updated_time = strtotime((string)$product_last_updated);
                    $minutes = round(abs($current_time - $last_updated_time) / 60);
                    if ($minutes >= 5) {
                        // product api call 
                        foreach($all_style_idx as $style_idx):
                            $this->product_api($style_idx);
                        endforeach;
                    }
                
                }
            }
        }

        //After sync with Ap21 call product detail
        $styles = Product::where('style',$style)
                          ->whereHas('variants', function ( $query ) {
                               return $query->where('visible', '=', 'Yes');
                           })
                           ->with('variants')
                           ->get();
        if(!$styles){
            return abort(404);
        }    
        $product=$styles->where('color_code',$color)->first(); // single product data 
        if(!$product){
            return abort(404);
        }   
        $colour_options=$styles->unique('color_code')->sortBy('seqno'); // all unique colors data
        $unique_data= $styles->map(function($style) use ($color) {
            if($color==$style->color_code){
                return $style->variants;
            }
        });
        $variants = $unique_data->flatten(); // merge widthwise data

        $product->price = $variants->max('price');
		$product->price_sale = $variants->max('price_sale');
        $product->stock = $variants->max('stock');
        
        return view ('customer.pdp',compact('product','variants','colour_options','styles'));
    }

    public function index_bkp($name,$style,$color){
        $product = Product::where('style',$style)
                          ->where('color_code',$color)
                          ->whereHas('variants', function ( $query ) {
                                $query->where('visible', '=', 'Yes');
                            })
                          ->first();
        if(!$product){
            return abort(404);
        }    
        $variants = $product->variants->where('stock', '!=', '0');

        $product->price = $variants->max('price');
		$product->price_sale = $variants->max('price_sale');
        $product->stock = $variants->max('stock');
        
        $colour_options = Product::where('style',$style)
                                ->whereHas('variants', function ( $query ) {
                                    $query->where('visible', '=', 'Yes');
                                })->get();
        $colour_options = Image::addImagePathsForProducts($colour_options); 

        return view ('customer.pdp',compact('product','variants','colour_options'));
    }
    public function list($prodtype){
        return view ('customer.list_' . $prodtype);
    }

    public function product_api($style_idx){
        $URL = env('AP21_URL') . "/Products/$style_idx?countryCode=" .  env('AP21_COUNTRYCODE');
        //echo "URL ==== $URL";
        $response = $this->bridge->sync_ap21_sku($style_idx);
        if (!empty($response)) { 
        $returnCode = $response->getStatusCode();
        switch ($returnCode) {
            case '200':
                $product = @simplexml_load_string($response->getBody()->getContents());
                //print_r($product);
                $current_date = date('Y-m-d');
                foreach ($product->Clrs->Clr as $curr_color) {
                    $color_idx = $curr_color->Id;
				    $color_code = $curr_color->Code;									
                    $color_name = $curr_color->Name;
                    $release_dt = Ap21_colour::where('clridx',$color_idx)->first();
                    if ($release_dt == ""):
                        $release_dt_str = "0000-00-00";
                    else:
                        $release_dt_str = ($release_dt->release_dt!='') ? date('Y-m-d', strtotime($release_dt->release_dt)) : "0000-00-00"; // to avoid 1970-01-01
                    endif;
                        foreach ($curr_color->SKUs->SKU as $curr_sku) {
                         
                        $org_price 	=$curr_sku->OriginalPrice;
                        $price 		=$curr_sku->Price;
                        $stock 		=$curr_sku->FreeStock;
                        $sku_id 	=$curr_sku->Id;
                        $price_sale	=$price;
                        //echo "<br> $color_idx - $sku_id";
                        if ($release_dt_str == '0000-00-00'):
                            //Visible should be No.. its made yes only for testing
                            $prod_data = array(
                                'stock' => $stock,
                                'price' => $org_price,
                                'price_sale' => $price_sale,
                                'release_date' => null,
                                'season' => 'Current',
                                'visible' => 'No',
                                'reason_no' => 'Release date blank',
                            );

                        elseif($release_dt_str > $current_date):
                            //Visible should be No.. its made yes only for testing
                            $prod_data = array(
                                'stock' => $stock,
                                'price' => $org_price,
                                'price_sale' => $price_sale,
                                'release_date' => $release_dt_str,
                                'season' => 'Current',
                                'visible' => 'No',
                                'reason_no' => 'Release date Future',
                            );
                        elseif($release_dt_str <= $current_date):							
                                if($stock>0):	
                                    $prod_data = array(
                                        'stock' => $stock,
                                        'price' => $org_price,
                                        'price_sale' => $price_sale,
                                        'release_date' => $release_dt_str,
                                        'season' => 'Current',
                                        'visible' => 'Yes',
                                        'reason_no' => '',
                                    );
                                else:
                                    $prod_data = array(
                                        'stock' => $stock,
                                        'price' => $org_price,
                                        'price_sale' => $price_sale,
                                        'release_date' => $release_dt_str,
                                        'season' => 'Current',
                                        'visible' => 'No',
                                        'reason_no' => 'Insufficient Stock',
                                    );
                                endif;
                        endif;

                        //echo "sku_id " .$sku_id."<br>";
                        //Update p_variant
                        Variant::where('id',$sku_id)->update($prod_data);

                    } // second foreach
                } // first foreach

                
                break;

            default:
                    $result = 'HTTP ERROR -> ' . $returnCode . "<br>" . $response->getBody()->getContents();
                    $return_value = false;
                        if ($returnCode != 404):
                            $data = array(
                                'curl_error_no' => $returnCode,
                                'URL' => $URL,
                                'Result' => $result,
                                'api_name' => 'Sync Product Error'
                            );
                            Mail::to(config('site.notify_email'))
                            ->cc(config('site.syg_notify_email'))
                            ->send(new ProductAp21Alert($data));
                           // $this->ci->alert_model->ap21_syncproduct_error_log($syncproduct_data); // Ap21 Syncproduct error log 
                        endif;
                break;
        }
    }
        //exit;
    }

}
