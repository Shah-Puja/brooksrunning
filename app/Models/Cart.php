<?php

namespace App\Models;

use Facades\App\Models\Freight;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ap21_log;
use App\Models\Promo_mast;

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
        if($this->cartItems->count() > 0){
            $xml_promo_st = $this->get_promo_xml();
            $cart_xml = view('xml.cart_xml',['caritems'=>$this->cartItems,'xml_promo_st'=>$xml_promo_st]);
            $xml = array();
            $cart_xml_response = $bridgeObject->processCart($cart_xml);
            if (!empty($cart_xml_response)) {
                $bridge = $cart_xml_response->getContents();
                $xml = simplexml_load_string($bridge);
            }
            $logger = array(
                'process' =>'Cart-API',                
                'request' => $cart_xml,
                'response' => $cart_xml_response,  
                'object_id'=>session('cart_id')             
            );
            Ap21_log::createNew($logger);
            if (!empty($xml) && !isset($xml->ErrorCode)) {
                foreach ($xml->CartDetails->CartDetail as $curr_detail) {
                    $temp = (array) $curr_detail;
                    $cartdetail_arr[] = $temp;
                }
                $xml_freight_charges = $xml->SelectedFreightOption->Value; //Freight chareges
                $total_due = (array) $xml->TotalDue;
                $cart_total = $total_due[0];
                $delivery_option = $this->delivery_type;
                switch($this->delivery_type){
                    case 'new_zealand':
                        $freight_charges = config('site.SHIPPING_NZ_PRICE');
                    break;
                    case 'standard':
                        if ($cart_total - $xml_freight_charges <= config('site.SHIPPING_SET_LIMIT')) {
                            $freight_charges = config('site.SHIPPING_SET_PRICE');
                        } else{
                            $freight_charges = '0.00';
                        }
                    break;
                    default:
                        $freight_charges = $this->freight_cost;
                }
                $total_disc = (array) $xml->TotalDiscount;
                $total_discount = $total_disc[0]; //Cart total
                ///update cart mast 
                $this->update(['total' => $cart_total - $xml_freight_charges, 'freight_cost' => $freight_charges, 'discount' => $total_discount, 'grand_total' => $freight_charges + $cart_total]);
                print_r(collect($cartdetail_arr));
                exit;
                
                //$cartdetail_arr->cart_items_update();
            }else{
                $this->cart_without_ap21();
            }
        }
    }

    public function cart_without_ap21(){
        if($this->cartItems->count() > 0){
            $this->update(['promo_code' => '', 'promo_string' => '', 'sku' => 0]);
            $this->cart_items_update();
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

    public function cart_items_update($items){
        foreach ($items as $item) {
            $this->$item->update(['discount_price' => $item->price_sale, 'discount_detail' => (isset($this->$item->discount)) ? $this->$item->discount : 0, 'price_sale' => $item->price_sale]);
        }
    }


}
