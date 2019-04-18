<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Naxon\NovaFieldSortable\Concerns\SortsIndexEntries;
use Naxon\NovaFieldSortable\Sortable;
use Chaseconey\ExternalImage\ExternalImage;

class Group_rank extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    
    public static $model = 'App\Models\Group_ranks';
    public static $displayInNavigation = false;
    public static $perPageViaRelationship = 50;


    use SortsIndexEntries;
    
    public static $defaultSortField ='display_rank';
    public static $indexDefaultOrder = [
        'display_rank' => 'desc'
    ];
    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
  
    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     * 
     */

    public static function indexQuery(NovaRequest $request, $query)
    {   
        $query =  $query->select('p_products.style','p_products.stylename','group_ranks.display_rank','group_ranks.id','p_images.image1','p_variants.price_sale')
                        ->distinct()
                        ->join('p_products', 'p_products.style', '=', 'group_ranks.style')
                        ->join('p_images', 'p_products.id', '=', 'p_images.product_id')
                        ->join('p_variants', 'p_products.id', '=', 'p_variants.product_id')
                        ->where('p_variants.visible' ,'Yes');
                        if (empty($request->get('orderBy'))) {
                            $query->getQuery()->orders = [];
                            return $query->orderBy(key(static::$indexDefaultOrder), reset(static::$indexDefaultOrder));
                        }
                         return $query;
    }
    
    public function fields(Request $request)
    {
        return [
            ExternalImage::make('Image', function () {
                return $this->handleImageRequest($this->image1, 'thumbnail');
            }),
            Text::make('Style','style')->hideWhenUpdating(),
            Text::make('Style Name','stylename')->hideWhenUpdating(),
            Text::make('Price', function () {
                return '$'.$this->price_sale;
            }),
            Sortable::make('Order', 'id'),
        ];
    }

    private function handleImageRequest($image, $size)
    {   
        $fullImageName = strtolower($image);
        $style = explode("_",$fullImageName);
		$imageName = substr( $fullImageName, 0, strrpos($fullImageName, ".") );
		$imageExtension = substr( $fullImageName, strrpos($fullImageName, ".") );
		return config('site.image_url.products.' . $size) .
				$imageName . 
				config('site.image_extensions.' . $size) .
				$imageExtension;
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
