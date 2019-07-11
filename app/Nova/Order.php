<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Panel;

class Order extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Order';
    public static $displayInNavigation = false;


   /**
     * Build an "index" query for the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->whereIn('status', ['Completed', 'Order Number']);
    }

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'order_no';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'order_no', 'app21_order', 'delivery_type'
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
            Text::make('Order Number', 'order_no')->sortable(),
            Text::make('Ap21 Order Number', 'app21_order')->sortable(),
            Date::make('Submitted Date', 'updated_at')->sortable(),
            Text::make('Status', 'status')->sortable(),
            Text::make('Total', function () {
                return '$'.$this->total;
            })->onlyOnDetail(),
            Text::make('GST', function () {
                return $this->gst;
            })->onlyOnDetail(),
            Text::make('Delivery Type', 'delivery_type')->onlyOnDetail(),
            Text::make('Freight Cost', function () {
                return '$'.$this->freight_cost;
            })->onlyOnDetail(),
            Text::make('Giftceryt Ap21 Code', 'giftcert_ap21code')->onlyOnDetail(),
            Text::make('Giftceryt Ap21 Pin', 'giftcert_ap21pin')->onlyOnDetail(),
            Text::make('Coupon Code', 'coupon_code')->onlyOnDetail(),
            Text::make('Discount', function () {
                return '$'.$this->discount;
            })->onlyOnDetail(),
            Text::make('Order Total', function () {
                return '$'.$this->grand_total;
            }),
            Text::make('Payment Type')->onlyOnDetail(),
            Text::make('Transaction ID', 'transaction_id')->onlyOnDetail(),

            HasMany::make('Order Items List', 'orderItems', 'App\Nova\Orderitem'),

            HasOne::make('Shipping Information', 'address', 'App\Nova\Orderaddress'),
            
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
            (new Metrics\TotalOrders),
            (new Metrics\OrderPerDay),
            (new Metrics\OrdersPlan),
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
            new Filters\Orderstatus,
            new Filters\Orderdatewise,
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
