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
                        ->with('cartItems.variant.product:id,color_name,stylename')
                        ->first();
            });
        }
    }

    public function compose(View $view)
    {
<<<<<<< HEAD
=======
        if(isset($this->cart) && !empty($this->cart)){
            foreach($this->cart->cartItems as $cart_item){
                //echo "<pre>";print_r();die;
                $this->cart['items_count'] += $cart_item->qty;
            }
        }
        
>>>>>>> 770a68bf7e559976f6df5f24972e26496a828f32
        $cart = $this->cart ?? new Cart;
        $view->with( compact('cart') );
    }

}