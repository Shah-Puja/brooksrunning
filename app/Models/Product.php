<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{

    use Searchable;

    protected $table = 'p_products';    
    protected $with = ['image','tags'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('image', function (Builder $builder) {
            $builder->whereHas('image', function($query) {
                $query->where('image1', '<>', NULL);
            });
        });
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->stylename,
            'product_type' => $this->prod_type,
            'colour' => $this->tags->where('key', 'C_F_COLOUR')->implode('value', ','),
            'width_name' => $this->variants->pluck('width_name')->unique()->implode(", "),
            'activity' => $this->tags->where('key', 'PF_F_ACTIVITY')->implode('value', ','),
            'style' => $this->style,
            'description' => $this->prod_desc,
            'specifications' => $this->specifications,
            'styleid' => $this->style_idx,
            'release_date' => strtotime( $this->variants->max('release_date') ),
        ];
    }

    public function categories()
    {
    	return $this->morphedByMany('App\Models\Category', 'group');
    }


    public function variants()
    {
    	return $this->hasMany('App\Models\Variant','product_id','id');
    }
    public function tags()
    {
    	return $this->hasMany('App\Models\Tag','product_id','id');
    }    

    public function colourOptions($style)
    {
        return self::where('style', $style);
    }

    /**
     * A product has image
     */
    
    public function image()
    {
        return $this->hasOne('App\Models\Image');
    }

    public function groups()
    {
        return $this->hasMany('App\Models\Group','product_id','id');
        
    }

    public function csvranks()
    {
        return $this->hasMany('App\Models\Csv_rank','product_id','id');
    }
    
    public static function getProducts_array($array) {
        $data_array = [];
        foreach($array as $item){
            $item = explode('_',$item);
            $style = $item[0];
            $color_code = $item[1];
            $data_array[] = array('style'=> $style,'color_code'=> $color_code);
        }   
        
        $style_array = collect($data_array)->pluck('style');
                  
        $styles = \App\Models\Product::whereIn("style",$style_array)
                                    ->whereHas('variants', function ( $query ) {
                                          $query->where('visible', '=', 'Yes');
                                    })
                                    ->with('variants')
                                    ->get();
            
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
        
        return [ 'products' => $products ,'colour_options' => $colour_options ];
    }
    
}
