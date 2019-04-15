<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Naxon\NovaFieldSortable\Concerns\SortsIndexEntries;
use Naxon\NovaFieldSortable\Sortable;

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
        if (empty($request->get('orderBy'))) {
            $query->getQuery()->orders = [];
            return $query->orderBy(key(static::$indexDefaultOrder), reset(static::$indexDefaultOrder));
        }
        return $query;
    }
    
    public function fields(Request $request)
    {
        return [
            Text::make('Style','style')->hideWhenUpdating(),
            Text::make('Style Name','stylename')->hideWhenUpdating(),
            Text::make('display rank','display_rank'),
            Sortable::make('Order', 'id'),
        ];
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
