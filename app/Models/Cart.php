<?php

namespace App\Models;

use Facades\App\Models\Freight;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model {

    protected $fillable = ['user_id', 'total', 'delivery_type', 'freight_cost', 'grand_total'];

    public function cartItems() {
        return $this->hasMany('App\Models\Cart_item');
    }

    public function order() {
        return $this->hasOne('App\Models\Order');
    }

    public static function createOrGetForUser() {
        $cart = self::firstOrCreate(['id' => session('cart_id'), 'user_id' => auth()->id() ?? null]);
        session()->put('cart_id', $cart->id);
        return $cart;
    }

    public function addOrUpdateItem($variantSelected) {
        //echo "<pre>";print_r($variantSelected);
        $this->cartItems()->updateOrCreate(
                [
            'variant_id' => $variantSelected->id,
            'price_sale' => ($variantSelected->price_sale > 0) ? $variantSelected->price_sale : $variantSelected->price,
            'price' => $variantSelected->price
                ], [
            'qty' => request('qty'),
                ]
        );
        $this->updateCartInformation();
    }

    public function deleteItem($variantSelectedId) {
        $this->cartItems()
                ->where('variant_id', $variantSelectedId)
                ->delete();
        $this->updateCartInformation();
    }

    public function deleteMast($cart_id) {
        $this->delete($cart_id);
        Cache::forget('cart' . $this->id);
    }

    public function verifyItems() {
        return $this->cartItems->every(function($item) {
                    return $item->qty <= $item->variant->stock;
                });
    }

    public function deleteUnavaliableItems() {
        $this->cartItems->each(function($item) {
            if ($item->qty > $item->variant->stock) {
                $item->delete();
            }
        });
        $this->updateCartInformation();
    }

    public function updateCartInformation() {
        $cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,gender,stylename,color_name')->first();
        $this->load('cartItems.variant.product:id,stylename');
        //echo "<pre>";print_R();die;
        $cartTotal = $this->cartItems
                ->reduce(function($total, $cart_item) {
            $price = (isset($cart_item->price_sale) && $cart_item->price_sale > 0) ? $cart_item->price_sale : $cart_item->price;
            if($cart_item->discount_price > 0){
                $price = $cart_item->discount_price;
            }
            return $total + ($price * $cart_item->qty);
        });
        //$freightCost = Freight::calculate($this);
        if(isset($cart->delivery_type) && $cart->delivery_type!="") {
            $freightCost = $cart->freight_cost;
        } else {
            $freightCost = Freight::calculate($cartTotal);
        }
        
        $this->update([
            //'items_count' => $this->cartItems->sum('qty'), 
            'total' => $cartTotal,
            'delivery_type' => ($cart->delivery_type) ? $cart->delivery_type : 'standard',
            'freight_cost' => $cart->freight_cost,
            'grand_total' => $cartTotal + $freightCost,
        ]);
        Cache::forget('cart' . $this->id);
    }

}
