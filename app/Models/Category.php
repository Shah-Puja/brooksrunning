<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   
    use NodeTrait;
	
    public function products()
    {
        return $this->morphToMany('App\Models\Product', 'group');
    }

    public function groups()
    {
    	return $this->hasMany('App\Models\group','group_id','id');
    }

    /**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
	    return 'slug';
    }
    
    public static function getProducts($category,$cat_id) {              

        $products =  \App\Models\Product::query() 
            ->whereHas('categories', function($query) use ($category) { 
                return $query->whereSlug($category); 
                })
            ->whereHas('variants' , function($query)  {
                return $query->where('visible', '=', 'Yes');
            })
            ->with('variants')
            ->with('csvranks')
            ->orderBy('style')
            ->orderBy('seqno')
            ->get();
            
            /*$sorted_products = $products->sortByd(function ($product, $key) use ($cat_id) {
                foreach($product->csvranks as $csvrank):
                    if($cat_id==$csvrank->group_id):
                      return  $csvrank->display_rank;
                    endif;
                endforeach;
              });
              */
            $sorted_products = $products->sortByDesc(function ($product, $key) {
                        foreach($product->variants as $variant):
                              return $variant->release_date;
                        endforeach;
                      });
               
        
            return $sorted_products;
        
        
    }

    public static function getProducts_main($gender,$prod_type,$name) {              
        $products =  \App\Models\Product::where('gender',$gender)
            ->where('prod_type',$prod_type)
            ->whereHas('variants' , function($query) use ($name)  {
                if($name=='sale'){
                    return $query->where('visible', '=', 'Yes')
                                 ->whereColumn('price_sale', '<', 'price');
                }else{
                    return $query->where('visible', '=', 'Yes');
                }
            })
            ->with('variants')
            ->orderBy('style')
            ->orderBy('seqno')
            ->get();
            //->get(['id','style','stylename', 'seqno', 'color_code']);
            //->values(); 
            
            $sorted_products = $products->sortByDesc(function ($product, $key){
                foreach($product->variants as $variant):
                      return $variant->release_date;
                endforeach;
              });
       

             return $sorted_products;
        
        
    }

    public static function provideFilters($products,$prod_type,$gender,$depth)
    {   
        $filters =[];
        $key_names = __($prod_type."_Filter");

        if($depth=='2' && $gender=='W' && $prod_type='Apparel'){ //womens-running-clothes
            $key_names =  collect($key_names)->merge('Cup Size')->all();
        }

        foreach($key_names as $key){
            
             switch($key):
                 case 'Size':
                    //$filters['Size'] = 
                    /*$products->map(function($product) {
                        return $product->variants->pluck('size');
                    })->flatten()->unique()->values()->sort();*/
                    $p = $products->map(function($product) {
                          return $product->variants;
                    })->flatten();
                   
                    $sorted = $p->sortBy(function ($product, $key) {
                        return $product->seqno;
                    });
                    //print_r($sorted);
                    $sizes = $sorted->pluck('size')->unique()->values();
                    
                    $sizes = ($prod_type!='Apparel') ? $sizes->sort() : $sizes;

                    $filters['Size'] = $sizes->filter(function ($value, $key){
                        return  (!strpos($value,'(') !== false) ? $value :'';
                    });
                    
                 break;

                 case 'Color':
                    $filters['Color'] = 
                    $products->map(function($product) {
                        return $product->tags->Where('key','C_F_COLOUR');
                    })->flatten()->pluck('value')->unique()->sort();
                 break;

                 case 'Experience Type':
                    $filters['Experience_Type'] = 
                    $products->map(function($product) {
                        return $product->experience;
                    })->flatten()->unique()->values()->sort();
                 break;

                 case 'Width':
                    $width_array = $products->map(function($product) {
                        return $product->variants->where('visible','Yes')->pluck('width_name');
                    })->flatten()->unique()->values()->sort();
                    $order_array = array("2A-Narrow","B-Narrow", "B-Normal", "D-Normal", "D-Wide" , "2E-Extra-Wide", "2E-Wide", "4E-Extra-Wide");
                    $filters['Width'] = (new static)->sort_array($width_array,$order_array);
                 break;

                 case 'Support Level':
                    $filters['Support_Level'] = 
                    $products->map(function($product) {
                        return $product->tags->Where('key','PF_F_SLEVEL');
                    })->flatten()->pluck('value')->unique()->sort();
                 break;

                 case 'Impact Level':
                    $filters['Impact_Level'] = 
                    $products->map(function($product) {
                        return $product->tags->Where('key','PS_F_IMPACT');
                    })->flatten()->pluck('value')->unique()->sort();
                 break;

                 case 'Cup Size':
                    $filters['Cup_Size'] = 
                    $products->map(function($product) {
                        return $product->tags->Where('key','PS_F_CUP');
                    })->flatten()->pluck('value')->unique()->sort();
                 break;

                 case 'Arch':
                    $filters['Arch'] = 
                    $products->map(function($product) {
                        return $product->tags->Where('key','PF_F_ARCH');
                    })->flatten()->pluck('value')->unique()->sort();
                 break;

                 case 'Activity':
                    $activity_array =  $products->map(function($product) {
                        return $product->tags->Where('key','PF_F_ACTIVITY');
                    })->flatten()->pluck('value')->unique()->sort();

                    $order_array = array("Road/Track","Offroad/Trail", "Court Sport" ,"Training");
                    $filters['Activity'] = (new static)->sort_array($activity_array,$order_array);
                 break;

                 case 'Midsole Drop':
                    $filters['Midsole_Drop'] = 
                    $products->map(function($product) {
                        return $product->tags->Where('key','PF_F_DROP');
                    })->flatten()->pluck('value')->unique()->sort();
                 break;

                 case 'Feature Preferences':
                    $filters['Feature_Preferences'] = 
                    $products->map(function($product) {
                        return $product->tags->Where('key','PS_F_PREFERENCE');
                    })->flatten()->pluck('value')->unique()->sort();
                 break;

                 case 'Great For':
                    $filters['Great_For'] = 
                    $products->map(function($product) {
                        return $product->tags->Where('key','PS_F_GREATFOR');
                    })->flatten()->pluck('value')->unique()->sort();
                 break;

                 case 'Breast Shape':
                    $filters['Breast_Shape'] = 
                    $products->map(function($product) {
                        return $product->tags->Where('key','PS_F_SHAPE');
                    })->flatten()->pluck('value')->unique()->sort();
                 break;

                 case 'Impact':
                    $filters['Impact'] = 
                    $products->map(function($product) {
                        return $product->tags->Where('key','PS_F_IMPACT');
                    })->flatten()->pluck('value')->unique()->sort();
                 break;

                 case 'Support Preference':
                 $filters['Support_Preference'] = 
                 $products->map(function($product) {
                     return $product->tags->Where('key','PS_F_SUPPORT');
                 })->flatten()->pluck('value')->unique()->sort();
              break;

             endswitch;
        }

		return $filters;
    }

    public static function getProducts_BKP2($gender, $category, $prod_type) {              

        //return \App\Product::query()
        $products = \App\Models\Product::query() 
            //->where('gender', $gender)
            //->where('prod_type', $prod_type)
            ->whereHas('categories', function($query) use ($category) { 
                return $query->whereName($category); 
                })
            ->whereHas('variants' , function($query)  {
                return $query->where('visible', '=', 'Yes');
            })
            ->orderBy('style')
            ->orderBy('seqno')
            ->get();
            //->get(['id','style','stylename', 'seqno', 'color_code']);
        //->values();      

        print_r($products);
        return($products);
        
        
    }

    public static function getProducts_bkp($gender, $category, $prod_type) {
        return \App\Models\Product::query()
        ->where('gender', $gender)
        ->where('prod_type', $prod_type)
        ->whereHas('categories', function($query) use ($category) { 
            return $query->whereName($category); 
            })
        ->whereHas('variants' , function($query)  {
            return $query->where('visible', '=', 'Yes');
        })
        ->orderBy('style')
        ->orderBy('seqno')
        ->get(['id','style','stylename', 'seqno', 'color_code']);
        //->values();      
        
        
    }

    public static function sort_array($array,$order_array){
        $sorted_array=array();
        foreach ($array as $key => $value) {		
            $curr_order=array_search($value, $order_array);
            $sorted_array[$value]=$curr_order;		
        } 
        asort($sorted_array);
        return array_keys($sorted_array);
        
    }


    

}
