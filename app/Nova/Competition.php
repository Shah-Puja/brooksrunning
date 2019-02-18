<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Trix;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class Competition extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Competition';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'comp_id','comp_name','slug'
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
            Text::make('ID','comp_id')->sortable(),
            Text::make('Name','comp_name')->sortable(),
            Text::make('Title Tag','title_tag')->hideFromIndex(),
            Text::make('Meta Descripition','meta_desc')->hideFromIndex(),
            Text::make('Keywords','keywords')->hideFromIndex(),
            Text::make('Title','title')->hideFromIndex(),
            Text::make('Title Color','title_color', function () {
                return $this->title_color." <span style='background-color:".$this->title_color.";padding: 2px 22px;'>&nbsp;</span>";
            })->asHtml()->hideFromIndex(),
            Text::make('Slug','slug')->sortable(),
            Text::make('Description','desc')->hideFromIndex(),
            Trix::make('Text','comp_text')->hideFromIndex(),
            Select::make('Status','status')->options([
                'Open' => 'Open',
                'Close' => 'Close',
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
