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
