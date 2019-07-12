<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;

class Orderaddress extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Order_address';
    public static $displayInNavigation = false;

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
        'id',
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
            Text::make('Order Number', function () {
                return $this->order->order_no;
            })->onlyOnDetail(),
            Text::make('Order Information','order_info')->onlyOnDetail(),

            new Panel('Billing Details', $this->billingaddressFields()),

            new Panel('Shipping Details', $this->shippingaddressFields()),
        ];
    }
    
    /**
     * Get the address fields for the resource.
     *
     * @return array
     */
    protected function billingaddressFields()
    {
        return [
            Text::make('Name', function () {
                return $this->b_fname.' '.$this->b_lname;
            }),
            Text::make('Email', 'email'),
            Text::make('Address', 'b_add1'),
            Text::make('Address Line 2','b_add2'),
            Text::make('City','b_city'),
            Text::make('State','b_state')->onlyOnDetail(),
            Text::make('Postal Code','b_postcode'),
            Text::make('Phone Number','b_phone')->onlyOnDetail(),
        ];
    }

    protected function shippingaddressFields()
    {
        return [
            Text::make('Name', function () {
                return $this->s_fname.' '.$this->s_lname;
            })->onlyOnDetail(),
            Text::make('Email', 'email')->onlyOnDetail(),
            Text::make('Address', 's_add1')->onlyOnDetail(),
            Text::make('Address Line 2','s_add2')->onlyOnDetail(),
            Text::make('City','s_city')->onlyOnDetail(),
            Text::make('State','s_state')->onlyOnDetail(),
            Text::make('Postal Code','s_postcode')->onlyOnDetail(),
            Text::make('Phone Number','s_phone')->onlyOnDetail(),
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
