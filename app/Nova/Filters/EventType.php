<?php

namespace App\Nova\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\BooleanFilter;

class EventType extends BooleanFilter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    //public $component = 'select-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {   
        if($value['current_events'] && $value['upcomming_events']) return $query;
        if($value['upcomming_events'])  return $query->where('event_dt','0');
        if($value['current_events'])  return $query->where('event_dt','>',date('Y-m-d'));
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return [
            'Upcomming Events' => 'upcomming_events',
            'Current Events' => 'current_events',
        ];
    }
}
