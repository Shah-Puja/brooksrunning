<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;

class CartController extends Controller
{
    public function show()
    {
		$cart = Cart::where( 'id', session('cart_id') )->with('cartItems.variant.product:id,name')->first();
		if ($cart && ! $cart->verifyItems() ) {
			$cart->deleteUnavaliableItems();
		}
        return view( 'cart.cart', compact('cart') );
    }
}
