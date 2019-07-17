<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()

    {  
        View::composer(
            ['customer.layouts.header_mobile','customer.layouts.header_desktop'], 'App\Http\ViewComposers\CartComposer'
        );
        /*view()->composer(
            'customer.layouts.header_desktop','App\Http\ViewComposers\CartComposer'
        );*/
        View::composer(
            ['customer.layouts.header'], 'App\Http\ViewComposers\MetaComposer'
        );
    
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        //$this->app->singleton(\App\Http\ViewComposers\CartComposer::class);
    }
}
