<?php

namespace App\Models;

use Facades\App\Models\Freight;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'items_count', 'total', 'freight_cost', 'grand_total'];

    public function cartItems()
    {
        return $this->hasMany('App\Models\Cart_item');
    }

    public function order()
    {
        return $this->hasOne('App\Models\Order');
    }

    public static function createOrGetForUser() {
        $cart = self::firstOrCreate([ 'id' => session('cart_id'), 'user_id' => auth()->id() ?? null ]);
        session()->put('cart_id', $cart->id);
        return $cart;
    }

    public function addOrUpdateItem($variantSelected)
    {
        $this->cartItems()->updateOrCreate(
                [
                    'variant_id' => $variantSelected->id,
                    'price'  => $variantSelected->price,
                    'rrp'  => $variantSelected->rrp,
                ],
                [
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
        $this->load('cartItems.variant.product:id,name');
        $cartTotal = $this->cartItems
                        ->reduce(function($total, $cart_item) { 
                            return $total + ($cart_item->price * $cart_item->qty); 
                        });
        $freightCost = Freight::calculate($this);
        $this->update([ 
            'items_count' => $this->cartItems->sum('qty'), 
            'total' => $cartTotal,
            'freight_cost' => $freightCost,
            'grand_total' => $cartTotal + $freightCost,
        ]);
        Cache::forget( 'cart'  . $this->id );
    }

}
