<?php

namespace App\Nova\Metrics;

use App\Models\Order;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Partition;

class OrdersPlan extends Partition
{   
    public $name = 'Orders Plan';  /// filter text name
    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->count($request,  Order::whereIn('status', ['Completed', 'Order Number']), 'status')
                    ->label(function ($value) {
                        switch ($value) {
                            case 'Completed':
                                return 'Order Completed';
                            default:
                                return ucfirst($value);
                        }
                    })
                    ->colors([
                        'Order Completed' => '#00b200',
                        'Order Number' => '#FFA500',
                        // photo will use the default color from Nova
                    ]);
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
         return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'orders-plan';
    }
}
