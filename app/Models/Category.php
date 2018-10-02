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
    
    public static function getProducts($category) {              

        return \App\Models\Product::query() 
            ->whereHas('categories', function($query) use ($category) { 
                return $query->whereSlug($category); 
                })
            ->whereHas('variants' , function($query)  {
                return $query->where('visible', '=', 'Yes');
            })
            ->with('variants')
            ->orderBy('style')
            ->orderBy('seqno')
            ->get();
            //->get(['id','style','stylename', 'seqno', 'color_code']);
            //->values();   
        
        
    }

    public static function provideFilters($products,$prod_type,$flag_bra)
    {   
        if($flag_bra=='Yes'){
            $name='Sportsbra';
        }else {  // footwear and apparel
            $name=$prod_type;
        }
        $filters =[];
        $key_names = __($name);

        foreach($key_names as $key){
            
             switch($key):
                 case 'Size':
                    $filters['Size'] = 
                    $products->map(function($product) {
                        return $product->variants->pluck('size');
                    })->flatten()->unique()->values()->sort();
                 break;

                 case 'Color':
                    $filters['Color'] = 
                    $products->map(function($product) {
                        return $product->tags->Where('key','C_F_COLOUR');
                    })->flatten()->pluck('value')->unique()->sort();
                 break;

                 case 'Width':
                    $filters['Width'] = 
                    $products->map(function($product) {
                        return $product->variants->pluck('width_name');
                    })->flatten()->unique()->values()->sort();
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

}
