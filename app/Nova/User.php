<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Country;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\HasMany;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\User';

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
        'id','email','first_name','last_name','user_type','gender','person_idx'
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
            Text::make('Person ID','person_idx')->sortable(),
            Text::make('Name', function () {
                return $this->first_name.' '.$this->last_name;
            }),
            Text::make('Source','source')->onlyOnDetail(),
            Text::make('User Type','user_type')->sortable(),
            Text::make('Email','email')->sortable(),
            Text::make('Gender','gender')->sortable(),
            Text::make('DOB','dob')->onlyOnDetail(),
            Text::make('Age Group','age_group')->onlyOnDetail(),
            Text::make('Postcode','postcode')->onlyOnDetail(),
            Country::make('State','state')->onlyOnDetail(),
            Text::make('Subscribed','subscribed')->onlyOnDetail(),
            
            HasMany::make('Orders')

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
            (new Metrics\TotalUsers),
            (new Metrics\UsersPerDay),
            (new Metrics\UsersPlan),
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
            new Filters\UserType,
            new Filters\Gender,
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
