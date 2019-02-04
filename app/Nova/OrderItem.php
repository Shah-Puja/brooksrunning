<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;
use Chaseconey\ExternalImage\ExternalImage;
use Laravel\Nova\Panel;

class OrderItem extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Order_item';
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
            Text::make('Order Number', function () {
                return $this->order->order_no;
            })->onlyOnDetail(),

            new Panel('Item Information', $this->itemslistFields()),
        ];
    }

    /**
     * Get the address fields for the resource.
     *
     * @return array
     */
    protected function itemslistFields()
    {
        return [
            ID::make()->sortable(),
            ExternalImage::make('Image','image'),
            Text::make('Variant ID', 'variant_id')->onlyOnDetail(),
            Text::make('Style', 'style')->sortable(),
            Text::make('Colour', 'colour')->sortable(),
            Text::make('Qty', 'qty')->sortable(),
            Text::make('Price Sale', function () {
                return '$'.$this->price_sale;
            }),
            Text::make('Price', function () {
                return '$'.$this->price;
            }),
            /*Text::make('Price', function () {
                return ($this->price_sale < $this->price) ? '<del>$'.$this->price.'</del> $'.$this->price_sale : '$'.$this->price;
            })->onlyOnDetail(),*/
            Text::make('Promo Code', 'promo_code')->onlyOnDetail(),
            Text::make('Discount', 'discount'),
            Text::make('Total', function () {
                return '$'.$this->total;
            }),
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
