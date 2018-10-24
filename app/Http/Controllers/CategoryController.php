<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function sale(){
        return view('customer.running-shoes-and-apparel-sale');
    }
}
