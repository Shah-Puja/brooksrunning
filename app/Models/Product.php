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

    
}
