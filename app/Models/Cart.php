<?php

namespace App\Models;

use Facades\App\Models\Freight;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ap21_log;
use App\Models\Promo_mast;

class Cart extends Model {

    protected $fillable = ['user_id', 'total', 'discount', 'delivery_type', 'freight_cost', 'grand_total'];

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
        if($this->cartItems->count() > 0){
            $xml_promo_st = $this->get_promo_xml();
            $cart_xml = view('xml.cart_xml',['caritems'=>$this->cartItems,'xml_promo_st'=>$xml_promo_st]);
            $xml = array();
            $cart_xml_response = $bridgeObject->processCart($cart_xml);
            if (!empty($cart_xml_response)) {
                $bridge = $cart_xml_response->getContents();
                $xml = simplexml_load_string($bridge);                  
                if (!empty($xml) && !isset($xml->ErrorCode)) {
                    foreach ($xml->CartDetails->CartDetail as $item) {
                        Cart_item::where('variant_id', $item->SkuId)
                                    ->where('cart_id', session('cart_id'))
                                    ->update([
                                        'discount_price' => $item->Value, 
                                        'discount_detail' => $item->Discount, 
                                        'price_sale' => $item->Price
                                    ]);
                    }                                                            
                    $cart_xml_total = $xml->TotalDue;
                    echo "cart_xml_total".$cart_xml_total;
                    $freight_cost = $this->freight_cost;
                    echo "freight_cost".$freight_cost;
                    $total_discount = $xml->TotalDiscount;
                    echo "total_discount".$total_discount;
                    $cart_total = $cart_xml_total - $freight_cost;
                    echo "cart_total".$cart_total;
                    if(empty($xml_promo_st)){ // update carts if promo data is empty 
                        $this->update([
                            'promo_code' => '', 
                            'promo_string' => '', 
                            'sku' => 0,
                            'total' => $cart_total, 
                            'freight_cost' => $freight_cost, 
                            'discount' => $total_discount, 
                            'grand_total' => $freight_cost + $cart_total]);
                    }else{
                        $this->update([
                            'total' => $cart_total, 
                            'freight_cost' => $freight_cost, 
                            'discount' => $total_discount, 
                            'grand_total' => $freight_cost + $cart_total
                            ]);
                    }                    
                }else{
                    $this->cart_without_ap21();
                }
            }else{
                $this->cart_without_ap21();
            }
            Ap21_log::createNew([
                        'process' =>'Cart-API',
                        'request' => $cart_xml,
                        'response' => $cart_xml_response,
                        'object_id'=>session('cart_id')
                    ]);
        }
        else{
            $this->cart_without_ap21();
        }
    }

    public function cart_without_ap21(){
        if($this->cartItems->count() > 0){
            $total=0;
            foreach ($this->cartItems  as $item) {
                $discount_price =  $item->variant->price_sale * $item->qty;
                $total+=$discount_price;
                $item->update([
                        'discount_price' => $total,
                        'discount_detail' => 0,
                        'price_sale' => $item->variant->price_sale
                      ]);
            }
            $cart_total = $total;
            ///carts update
            $this->update([
                    'promo_code' => '',
                    'promo_string' => '',
                    'sku' => 0,
                    'gift_id' =>'',
                    'pin' => '',
                    'gift_available_amount' => '',
                    'gift_discount' => '' ,
                    'gift_cart_total' => '',
                    'total' => $cart_total,
                    'freight_cost' =>$this->freight_cost,
                    'discount' => 0,
                    'grand_total' => $this->freight_cost + $cart_total
                ]);
        }

    }

    public function get_promo_xml(){
        $promo_array = array();
        if ($this->promo_code != "") {
            $promo_code = promo_mast::where('promo_string', $this->promo_code)->whereRaw('CURDATE() between `start_dt` and `end_dt`')->first();
            if (!empty($promo_code)) {
                $promo_array = ['skuid'=>$promo_code->skuidx,'qty'=>1];
            }
        }
        return $promo_array;
    }

    public function gift_voucher($bridgeObject){
        if($this->cartItems->count() > 0 && $this->pin!='' && $this->gift_id!=''){
            $cartTotal = $this->total;
            $freight_cost = $this->freight_cost;
            $giftcert_pin = $this->pin;
            $response = $bridgeObject->vouchervalid($this->gift_id, $giftcert_pin, $cartTotal + $freight_cost);
            $response_body = $response;
            if (!empty($response)) {
                $returnCode = $response->getStatusCode();
                switch ($returnCode) {
                    case 200:
                        $response_body = $response->getBody()->getContents();
                        $xml = simplexml_load_string($response_body);
                        $gift_number = (int) ($xml->VoucherNumber);
                        $gift_pin = $giftcert_pin;
                        $ExpiryDate = (int) ($xml->ExpiryDate);
                        $AvailableAmount = (int) ($xml->AvailableAmount);
                        if ($AvailableAmount > ($cartTotal + $freight_cost)) {
                            $gift_discount = ($cartTotal + $freight_cost); 
                            $gift_cart_total = 0;
                        } else {
                            $gift_discount = $AvailableAmount;
                            $gift_cart_total = ($cartTotal + $freight_cost) - $AvailableAmount;
                        }
                        $this->update([
                                    'gift_id' => $gift_number,
                                    'pin' => $gift_pin,
                                    'gift_available_amount' => $AvailableAmount,
                                    'gift_discount' => $gift_discount,
                                    'gift_cart_total' => $gift_cart_total
                                ]);
                        break;
                   default:
                        $this->cart_without_ap21();
                }
            }else{
                $this->cart_without_ap21();
            }

            Ap21_log::createNew([
                'process' => 'Gift voucher',
                'request' => 'Gift id:'.$this->gift_id.', Pin:'.$this->pin,
                'response' => $response_body,
                'object_id'=>session('cart_id')
            ]);
        }
    }

}
