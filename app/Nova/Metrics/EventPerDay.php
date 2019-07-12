<?php

namespace App\Nova\Metrics;

use App\Models\Event_mast;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Trend;

class EventPerDay extends Trend
{  

    public $name = 'New Events';  /// filter text name
    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->countByDays($request, Event_mast::class)->showLatestValue();
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [
            1 => 'Today',
            7 => '7 Days',
            10 => '10 Days',
            15 => '15 Days',
        ];
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
        return 'event-per-day';
    }
}
