<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Group_ranks extends Model implements Sortable
{   
    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'display_rank',
        'sort_when_creating' => true,
    ];

    public function category()
    {
    	return $this->belongsTo('App\Models\Category');
    }
}
