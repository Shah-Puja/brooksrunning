<?php

namespace App\Http\ViewComposers;

use App\Models\Meta_tag;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class MetaComposer
{
    protected $meta;
    public function __construct()
    {   
        $parsed_url=parse_url(url()->current()); 
        $path  = isset($parsed_url['path']) ? $parsed_url['path'] : ''; 
        $query = isset($parsed_url['query']) ? '?' . $parsed_url['query'] : ''; 
        $meta_url = $path.''.$query;
        $this->meta = Meta_tag::where( 'url', $meta_url )->first();
    }

    public function compose(View $view)
    {
        $meta = $this->meta ?? new Meta_tag;
        $view->with( compact('meta') );
    }

}