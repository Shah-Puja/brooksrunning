<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Variant;
use Illuminate\Http\Request;

class CartItemsController extends Controller
{

	protected $variantSelected;
	public function __construct()
	{
		$this->middleware(function ($request, $next) {
            //echo "<pre>";print_r($request->all()); echo "<hr>";
            $this->variantSelected = Variant::select('*')->where([
                ['size', request('size')],
                ['product_id', request('product_id')],
                ['width_code', request('width_code')]
            ])->first();
            
	        if ( ! $this->variantSelected ) {
	            return response()->json([ 'errors' => 'Invalid Item' ], 400);
	        }
            if ( $this->variantSelected->stock == 0 ) {
                return response()->json([ 'errors' => 'Item not in stock' ], 400);
            }
            if ( $this->variantSelected->stock < request('qty') ) {
                return response()->json([ 'errors' => 'Quantity ordered is not available' ], 400);
            }
		    return $next($request);
		})->only(['store', 'update']);
	}

    public function store() {
        $cart = Cart::createOrGetForUser();

        if ( request('qty') > 0 ) {
            $cart->addOrUpdateItem($this->variantSelected); 
        } else {
        	$cart->deleteItem($this->variantSelected->id);
    	}

        $cart->load('cartItems.variant.product:id,color_name,stylename');
        
        if(isset($cart) && !empty($cart)){
            foreach($cart->cartItems as $cart_item){ 
                $cart['items_count'] += $cart_item->qty;
            }
        }
        return response()->json([
            'cartitemshtml' => view( 'cart.ajaxpopupcart', compact( 'cart' ) )->render(),
            'cart_count' => $cart->items_count,
        ]);
    }

    public function destroy() {
        $cart = Cart::createOrGetForUser();

		$cart->deleteItem( request('id') );
        if(isset($cart) && !empty($cart)){
            foreach($cart->cartItems as $cart_item){ 
                $cart['items_count'] += $cart_item->qty;
            }
        }
        return response()->json([
            'cartitemshtml' => view( 'cart.ajaxpopupcart', compact('cart') )->render(),
            'cart_count' => $cart->items_count,
            'cartpagecartitemshtml' => view( 'cart.ajaxcartproductinfo', compact('cart') )->render(),
            'ordersummaryhtml' => view( 'cart.order_summary', compact('cart') )->render(),
        ]);
    }

    public function update() {
        $cart = Cart::createOrGetForUser();

        if ( request('qty') > 0 ) {
        	$cart->addOrUpdateItem($this->variantSelected);
        } else {
        	$cart->deleteItem($this->variantSelected->id);
    	}

        $cart->load('cartItems.variant.product:id,color_name,stylename');
        if(isset($cart) && !empty($cart)){
            foreach($cart->cartItems as $cart_item){ 
                $cart['items_count'] += $cart_item->qty;
            }
        }
        return response()->json([
            'cartitemshtml' => view( 'cart.ajaxpopupcart', compact('cart') )->render(),
            'cart_count' => $cart->items_count,
            'cartpagecartitemshtml' => view( 'cart.ajaxcartproductinfo', compact('cart') )->render(),
            'ordersummaryhtml' => view( 'cart.order_summary', compact('cart') )->render(),
        ]);
    }

}
