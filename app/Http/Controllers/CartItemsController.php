<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Variant;
use Illuminate\Http\Request;

class CartItemsController extends Controller {

    protected $variantSelected;

    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->variantSelected = Variant::find( request('id') );
            
            if (!$this->variantSelected) {
                return response()->json(['errors' => 'Invalid Item'], 400);
            }
            /*if ($this->variantSelected->stock == 0) {
                return response()->json(['errors' => 'Item not in stock'], 400);
            }
            if ($this->variantSelected->stock < request('qty')) {
                return response()->json(['errors' => 'Quantity ordered is not available'], 400);
            }*/
            return $next($request);
        })->only(['store', 'update']);
    }

    public function store() {
        $cart = Cart::createOrGetForUser();

        if (request('qty') > 0) {
            $cart->addOrUpdateItem($this->variantSelected);
        } else {
            $cart->deleteItem($this->variantSelected->id);
        }

        $cart->load('cartItems.variant.product:id,gender,color_name,stylename');

        if (isset($cart) && !empty($cart)) {
            foreach ($cart->cartItems as $cart_item) {
                $cart['items_count'] += $cart_item->qty;
            }
        }
        return response()->json([
                    'cartitemshtml' => view('cart.ajaxpopupcart', compact('cart'))->render(),
                    'cart_count' => $cart->items_count,
        ]);
    }

    public function destroy() {
        //$cart = Cart::createOrGetForUser();
        $cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,gender,stylename,color_name,cart_blurb')->first();
        $cart->deleteItem(request('id'));
        if (count($cart->cartItems) == 0) { 
            $cart_id = session('cart_id');
            $cart->deleteMast($cart_id);
        }
        if (isset($cart) && !empty($cart)) {
            foreach ($cart->cartItems as $cart_item) {
                $cart['items_count'] += $cart_item->qty;
            }
        }
        return response()->json([
                    'cartitemshtml' => view('cart.ajaxpopupcart', compact('cart'))->render(),
                    'cart_count' => $cart->items_count,
                    'cartpagecartitemshtml' => view('cart.ajaxcartproductinfo', compact('cart'))->render(),
                    'ordersummaryhtml' => view('cart.order_summary', compact('cart'))->render(),
        ]);
    }

    public function update() {
        $cart = Cart::createOrGetForUser();

        if (request('qty') > 0) {
            $cart->addOrUpdateItem($this->variantSelected);
        } else {
            $cart->deleteItem($this->variantSelected->id);
        } 
        if (isset($cart) && !empty($cart)) {
            foreach ($cart->cartItems as $cart_item) {
                $cart['items_count'] += $cart_item->qty;
            }
        }
        $cart->load('cartItems.variant.product:id,gender,color_name,stylename');
        return response()->json([
                    'cartitemshtml' => view('cart.ajaxpopupcart', compact('cart'))->render(),
                    'cart_count' => $cart->items_count,
                    'cartpagecartitemshtml' => view('cart.ajaxcartproductinfo', compact('cart'))->render(),
                    'ordersummaryhtml' => view('cart.order_summary', compact('cart'))->render(),
        ]);
    }

}