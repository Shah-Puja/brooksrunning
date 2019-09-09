<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\DateTime;
use Carbon\Carbon;

class PromoCode extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Promo_mast';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'promo_mast_id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'promo_type','promo_string','promo_code','skuidx','start_dt','end_dt'
    ];



   

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {   
        
       
        return [
            ID::make('Promo id','promo_mast_id')->sortable(),
            Text::make('Promo string ','promo_string')->sortable()->rules('required'),
            Text::make('Promo code','promo_code')->sortable()->rules('required'),
            Text::make('Skuidx','skuidx')->sortable()->rules('required'),
            
            Select::make('Promo type','promo_type')->options([
                'Onetime' => 'Onetime',
                'Multiple' => 'Multiple',
            ])->sortable(),

            Text::make('Promo title','promo_title')->sortable()->hideFromIndex(),
            Text::make('Promo desc','promo_desc')->sortable()->hideFromIndex(),
            Text::make('Promo Text','promo_display_text')->sortable()->hideFromIndex(),
            
            DateTime::make('Start date','start_dt')->rules('required'),

            DateTime::make('End date','end_dt')->sortable()->rules('required'),
            Text::make('Discount','discount')->sortable(),
            
            Select::make('Discount type','discount_type')->options([
                'percentage' => 'percentage',
                'flat' => 'flat',
            ])->sortable(),

            Select::make('Status','active')->options([
                'Yes' => 'Yes',
                'No' => 'No',
            ])->sortable(),
            

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
