<?php

namespace App\Models;

use Facades\App\Models\Freight;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ap21_log;

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

    public function cart_api($bridgeObject) {   /// new function
        if(env('AP21_STATUS') == "ON" && $this->cartItems->count() > 0){
            $cart_xml = view('xml.cart_call')->with('cart',$this);
            $xml = array();
            $cart_xml_response = $bridgeObject->processCart($cart_xml);
            $logger = array(
                'process' =>'Cart-API',                
                'request' => $cart_xml,
                'response' => $cart_xml_response,  
                'object_id'=>session('cart_id')             
            );
            print_r($logger);
            //Ap21_log::createNew($logger);
            if (!empty($cart_xml_response)) {
                $xml = simplexml_load_string($cart_xml_response->getContents());
            }
            $cartdetail_arr = $xml;
            print_r($cartdetail_arr);
            exit;
            if (!empty($xml) && !isset($xml->ErrorCode)) {
                $cartdetail_arr = $xml->CartDetails->CartDetail;
                print_r($cartdetail_arr);
                exit;
                $xml_freight_charges = $xml->SelectedFreightOption->Value; //Freight chareges
                $total_due = (array) $xml->TotalDue;
                $cart_total = $total_due[0];
                /*$delivery_option = $cart['delivery_type'];
                if ($delivery_option == 'new_zealand') {
                    $freight_charges = config('site.SHIPPING_NZ_PRICE');
                } elseif ($delivery_option == 'standard') {
                    if ($cart_total - $xml_freight_charges <= config('site.SHIPPING_SET_LIMIT')) {
                        $freight_charges = config('site.SHIPPING_SET_PRICE');
                    } else if (empty($cart_total) || $cart_total <= 0) {
                        $freight_charges = '0.00';
                    } else {
                        $freight_charges = '0';
                    }
                } else {
                    //echo $delivery_option;die;
                    //echo "<pre>";print_r($cart['freight_cost']);die;
                    if (!empty($cart)) {
                        $freight_charges = $cart['freight_cost'];
                    }
                }
                $total_disc = (array) $xml->TotalDiscount;
                $total_discount = $total_disc[0]; //Cart total

                $data['cart_detail'] = $cartdetail_arr;
                $data['cart_total'] = $cart_total - $xml_freight_charges;
                $data['original_cart_total'] = $cart_total;
                $data['total_discount'] = $total_discount;
                $data['freight_charges'] = $freight_charges;*/
            }
            
        }
            
    }


}
