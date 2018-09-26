<?php

namespace App\Http\ViewComposers;

use App\Models\Cart;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class CartComposer
{

    protected $cart;
    public function __construct()
    {
        if ( session('cart_id') ) {
            $this->cart = Cache::remember('cart' . session('cart_id'), 4320, function() {
                return Cart::where( 'id', session('cart_id') )
                        ->with('cartItems.variant.product:id,stylename')
                        ->first();
            });
        }
        dd($this->cart);
    }

    public function compose(View $view)
    {
        $cart = $this->cart ?? new Cart;
        $view->with( compact('cart') );
    }

}