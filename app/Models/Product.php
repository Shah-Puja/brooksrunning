<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    protected $table = 'p_products';
    protected $with = ['media'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('image', function (Builder $builder) {
            $builder->whereHas('media', function($query) {
                $query->where('image1', '<>', NULL);
            });
        });
    }
    /**
     * A product can be in many categories
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    /**
     * A hero product has many variants
     */
    public function heroVariants()
    {
        return $this->hasMany('App\Models\Variant');
    }

    /**
     * A product has many variants
     */
    public function variants()
    {
        return $this->hasMany('App\Models\Variant', 'style', 'style');
    }

    /**
     * A product has media
     */
    public function media()
    {
        return $this->hasOne('App\Models\Media');
    }

    /**
     * Products can be filtered by category/categories
     */
    public function byCategory($categories)
    {
    	$categories = explode(',', $categories);
		return $this->whereHas('categories', function ($query) use ($categories) {
		    $query->whereIn('id', $categories);
		});
    }

    /**
     * Products can be filtered to get colour options for a style
     */
    public function colourOptions()
    {
        return self::where('style', $this->style);
    }

    public function getDescriptionBulletPointsAttribute($value)
    {
        return self::formatForLi($value);
    }

    public function getHighlightsAttribute($value)
    {
        return self::formatForLi($value);
    }

    public function getSpecificationsAttribute($value)
    {
        return self::formatForLi($value);
    }

    protected static function formatForLi($value)
    {
        return collect( explode( '~~', trim($value) ) )
                    ->reduce(function ( $value, $item ) {
                        if ( trim($item) != "") {
                            return $value .= "<li>" . trim($item) . "</li>";
                        }
                    }, "");
    }
}
