<?php

namespace App\Http\ViewComposers;

use App\Models\Promo_banners;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class BannerComposer
{
    protected $banner;
    public function __construct(Request $request)
    {   
        $this->banner = \App\Models\Promo_banners::where('active','Y')
        ->where('start_date','<=',now())
        ->where('end_date','>',now())
        ->where('sticky_header','Y')
        ->first();
      
        // if((!empty( $this->banner->start_date) &&  $this->banner->start_date!='0000-00-00 00:00:00') && (!empty( $this->banner->end_date)  &&  $this->banner->end_date!='0000-00-00 00:00:00') ){
        //     $this->banner = ( $this->banner->start_date <= now() &&  $this->banner->end_date >=now() ) ?  $this->banner : '';
        // }
        $parsed_url=parse_url(url()->current()); 

        $path  = isset($parsed_url['path']) ? $parsed_url['path'] : '/'; 

        $segments=array('/running-shoes-and-apparel-sale',
                        '/womens-running-shoes-sale',
                        '/womens-running-clothes-sale',
                        '/mens-running-shoes-sale',
                        '/mens-running-clothes-sale',
                        '/cart',
                        '/shipping',
                        '/success');

        if (in_array($path, $segments)) {
            $this->banner='';
        }

    }

    public function compose(View $view)
    {
        $header_banner =  $this->banner ?? new Promo_banners;
        $view->with( compact('header_banner') );
    }

}