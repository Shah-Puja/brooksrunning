<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    protected $table = 'p_products';    
    protected $with = ['image','tags'];

    protected static function boot()
    {
        parent::boot();
       static::addGlobalScope('image', function (Builder $builder) {
           /* $builder->whereHas('image', function($query) {
                $query->where('image1', '<>', NULL);
            });*/
        });
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

    
}
