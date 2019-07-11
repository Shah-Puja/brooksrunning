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

    //public static $displayInNavigation = false;
    public static $model = 'App\Models\Event';


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
        'event_name','event_dt'
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
            ID::make()->sortable(),
            Text::make('Event Name','event_name')->sortable()->rules('required', 'max:255'),
            Text::make('Slug','slug')->hideFromIndex()->rules('required', 'max:255'),
            Image::make('Logo','logo')->disk('uploads_event_logo')->storeAs(function (Request $request) {
                return $request->logo->getClientOriginalName();
            })->hideFromIndex(),
            Image::make('Banner','banner')->disk('uploads_event_banner')->storeAs(function (Request $request) {
                return $request->banner->getClientOriginalName();
            })->hideFromIndex(),
            Text::make('Banner Background Colour','banner_bg_color')->hideFromIndex(),
            Text::make('Event Date String ','date_str')->sortable(),
            Text::make('Event Date ','event_dt')->hideFromIndex(),
            Text::make('Month','month')->hideFromIndex(),
            Text::make('Year','year')->sortable(),
            Text::make('Next Event Date','next_event_dt')->hideFromIndex(),
            Text::make('City','city')->hideFromIndex(),
            Text::make('State','state')->hideFromIndex(),
            Text::make('Country','country')->hideFromIndex(),
            Textarea::make('Content','content')->hideFromIndex(),
            Text::make('H1 Tag','h1_tag')->hideFromIndex(),
            Text::make('Title Tag','title_tag')->hideFromIndex(),
            Text::make('Link','link')->hideFromIndex(),
            Select::make('Status','status')->options([
                'YES' => 'YES',
                'NO' => 'NO',
            ])->sortable(),
            Select::make('Flag Show','flag_show')->options([
                'YES' => 'YES',
                'NO' => 'NO',
            ])->hideFromIndex(),
            Text::make('Series','series')->hideFromIndex(),
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
            //(new Metrics\TotalEvents),
            //(new Metrics\EventPerDay),
            //(new Metrics\EventsPlan),
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
            new Filters\EventType,
            new Filters\Eventstatus,
            //new Filters\Eventfeatured,
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
