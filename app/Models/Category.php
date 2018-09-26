<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
        //return $this->belongsToMany('App\Product');
        return $this->morphToMany('App\Models\Product', 'group');
    }

    public static function getProducts($gender, $category, $prod_type) {              

        //return \App\Product::query()
        $products = \App\Models\Product::query() 
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
