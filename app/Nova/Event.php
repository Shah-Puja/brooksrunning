<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Date;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Support\Facades\Storage;
use Laravel\Nova\Actions\Actionable;

class Event extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */


    public static $model = 'App\Models\Event_mast';


    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'event_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'event_id','event_name','event_date'
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
            Text::make('ID','event_id')->sortable(),
            Text::make('Event Name','event_name')->sortable(),
            Text::make('Slug','slug')->hideFromIndex(),
            Image::make('Logo','logo')->disk('public')->path('images/events/logo')->storeAs(function (Request $request) {
                return $request->logo->getClientOriginalName();
            })->hideFromIndex(),
            Text::make('Location','location')->hideFromIndex(),
            Text::make('Event Date','event_date')->sortable(),
            Text::make('Event Timestamp','event_timestamp')->withMeta(['extraAttributes' => [
                'placeholder' => 'yyyy-mm-dd']
            ])->hideFromIndex(),
            Text::make('URL','url')->hideFromIndex(),
            Text::make('Title Tag','title_tag')->hideFromIndex(),
            Text::make('Meta Desc','meta_desc')->hideFromIndex(),
            Text::make('Keywords','keywords')->hideFromIndex(),
            Text::make('H1 Tag','h1_tag')->hideFromIndex(),
            Textarea::make('Content','content')->hideFromIndex(),
            Text::make('Page Link','page_link')->hideFromIndex(),
            Image::make('Main Image','image')->disk('public')->path('images/events/main')->storeAs(function (Request $request) {
                return $request->image->getClientOriginalName();
            })->hideFromIndex(),
            Text::make('Background Colour','bg_color')->hideFromIndex(),
            Image::make('Banner','banner')->disk('public')->path('images/events/banner')->storeAs(function (Request $request) {
                return $request->banner->getClientOriginalName();
            })->hideFromIndex(),
            Text::make('Banner Background Colour','banner_bg_color')->hideFromIndex(),
            Text::make('Country','country')->hideFromIndex(),
            Text::make('State','state')->hideFromIndex(),
            Text::make('Month','month')->hideFromIndex(),
            Text::make('Event Type','event_type')->hideFromIndex(),
            Select::make('Status','status')->options([
                'Y' => 'Y',
                'N' => 'N',
            ])->sortable(),
            Select::make('Featured','featured')->options([
                'Y' => 'Y',
                'N' => 'N',
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
        return [
            (new Metrics\TotalEvents),
            (new Metrics\EventPerDay),
            (new Metrics\EventsPlan),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            new Filters\Eventstatus,
            new Filters\Eventfeatured,
            new Filters\Eventdate,
        ];
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
