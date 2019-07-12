<?php

namespace App\Nova\Filters;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Laravel\Nova\Filters\Filter;

class UserType extends Filter
{
    
    public $name = 'User Type';  /// filter text name
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
        return $query->where('user_type', $value);
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
            'User' => 'User',
            'Subscriber' => 'Subscriber',
            'Store' => 'Store',
            'Competition' => 'Competition',
            'Order' => 'Order',
            'Manual' => 'Manual',
        ];
    }
}