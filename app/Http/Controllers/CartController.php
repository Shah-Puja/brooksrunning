<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_item;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\SYG\Bridges\BridgeInterface as Bridge;
use App\Models\Promo_mast;

class CartController extends Controller {

    public function __construct(Bridge $b) {
        $this->bridgeObject = $b;
    }

    public function show() {
        $cart_arr = array();
        //session(['cart_id' => '1']); //comment this static after add to cart functionality
        //echo "<pre>";print_r(session()->all());die;
        $cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,gender,stylename,color_name,cart_blurb')->first();
//echo "<pre>";print_r($cart);die;
        if (isset($cart) && !empty($cart)) {
            $cart_arr = json_decode(json_encode($cart), true);

            foreach ($cart->cartItems as $cart_item) {

                $cart['items_count'] += $cart_item->qty;
            }
        }
        // echo "<pre>";print_r($cart);die;
        /* checking stock - Not required
          if ($cart && !$cart->verifyItems()) {
          $cart->deleteUnavaliableItems();
          } */



        if (env('AP21_STATUS') == "ON") {
            $cart_details = $skuidx_arr = array();
            if (!empty($cart) && isset($cart['items_count']) && $cart['items_count'] > 0) {
                if (isset($cart->promo_code) && $cart->promo_code != "") {
                    $check_promo_code = promo_mast::where('promo_string', $cart->promo_code)->whereRaw('CURDATE() between `start_dt` and `end_dt`')->first();
                    if (!empty($check_promo_code)) {

                        $check_promo_code = json_decode(json_encode($check_promo_code), true);
                        $check_promo_code['qty'] = 1;


                        array_push($cart_arr['cart_items'], $check_promo_code);
                    }
                    if (empty($check_promo_code)) {
                        //remove_promo_code
                        Cart::where('id', session('cart_id'))->update(['promo_code' => '', 'promo_string' => '', 'sku' => 0]);
                    }
                }

                $data = $this->cart_api($cart_arr);
                $this->check_gift_voucher();
            }



            /* echo "<pre>";
              print_r($data);
              die; */
            if (!empty($data)) {
                $cart_total = $data['cart_total'];
                $total_discount = $data['total_discount'];
                $freight_charges = $data['freight_charges'];

                Cart::where('id', session('cart_id'))->update(['total' => $cart_total, 'freight_cost' => $freight_charges, 'discount' => $total_discount, 'grand_total' => $freight_charges + $cart_total]);

                $cart_details = $data['cart_detail'];
            }

            if (!empty($cart_details)) {
                foreach ($cart_details as $item):
                    if ($item['ProductCode'] == 'EXPRESS') {
                        $cart_total = $cart_total - $item['Value'];
                        $freight_charges = $item['Value'];
                        $cart_total = $cart_total;
                        Cart::where('id', session('cart_id'))->update(['total' => $cart_total, 'freight_cost' => $freight_charges]);
                    }

                    if (!empty($item['Price']) && $item['Price'] != 0 && $item['ProductCode'] != 'EXPRESS') {
                        $cart_api_price_sale = $item['Price'];
                        $discount_detail = isset($item['Discount']) ? $item['Discount'] : "";
                        Cart_item::where('variant_id', $item['SkuId'])->where('cart_id', session('cart_id'))->update(['discount_price' => $item['Value'], 'discount_detail' => $discount_detail, 'price_sale' => $cart_api_price_sale]);
                    }
                endforeach;
            }
            $cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,gender,stylename,color_name,cart_blurb')->first();
        }

        /* echo $cart_total;
          die; */
        //return $data;

        if (isset($cart->promo_code) && $cart->promo_code != "") {
            $promo_code = promo_mast::where('promo_string', $cart->promo_code)->first();
            $cart['promo_display_text'] = $promo_code->promo_display_text;
        }
        if(isset($total_discount) && $total_discount == 0 && (isset($cart->promo_code) && $cart->promo_code == "HEROES")){
            $cart['subcode_text'] = "This promotion code does not apply to your product selection.";
        }
        return view('cart.cart', compact('cart'));
    }

    public function cart_api($cart) {
        $data = array();
        $freight_charges = 0;

        if (!empty($cart)) {
            $cart_xml = "<Cart>
						<PersonId>115414</PersonId>
						<Contacts>
						</Contacts>
							<CartDetails>\n\t";
            foreach ($cart['cart_items'] as $item) {
                $sku = isset($item['variant_id']) ? $item['variant_id'] : $item['skuidx'];
                $qty = $item['qty'];
                $cart_xml .= "		<CartDetail>		
									<SkuId>$sku</SkuId>
									<Quantity>$qty</Quantity>
								</CartDetail>\n\t";
            }
            $cart_xml .= "
                            </CartDetails>
                        </Cart>";
                        
            //echo $cart_xml;

            $bridge = $this->bridgeObject->processCart($cart_xml)->getContents();
            $xml = simplexml_load_string($bridge);
            //$xml = $xml->simplexml_load_string();
            /* echo "<pre>";
              print_r($xml);die; */
            //dd($xml);
            $cartdetail_arr = array();
            if (!empty($xml) && !isset($xml->ErrorCode)) {
                foreach ($xml->CartDetails->CartDetail as $curr_detail) {
                    /* echo "<pre>";
                      print_r($curr_detail);die; */
                    $temp = (array) $curr_detail;
                    $sku = $curr_detail->SkuId;
                    if (!empty($curr_detail->Price) && $curr_detail->ProductCode != 'EXPRESS') {
                        //$result = $this->cart_model->get_prod_type($sku, $user_id);
                        if (!empty($result)) {
                            //$temp['prod_type'] = $result->prod_type;
                            $temp['cart_id'] = $result->cart_id;
                            $temp['original_price'] = $result->original_price;
                            $temp['code'] = $result->code; //Style
                            $temp['product_id'] = $result->product_id;
                            $temp['color'] = $result->color;
                            //$temp['price_sale']= $result->price_sale;
                        }
                    }
                    $cartdetail_arr[] = $temp;
                }
                $xml_freight_charges = $xml->SelectedFreightOption->Value; //Freight chareges
                $total_due = (array) $xml->TotalDue;
                $cart_total = $total_due[0];
                //$cart->delivery_type
                /* echo "<pre>";
                  print_r();die; */
                $delivery_option = $cart['delivery_type'];
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
                $data['freight_charges'] = $freight_charges;
            }
            return $data;
        }
    }

    public function update_delivery_option() {
        $delivery_option = request('delivery_option_value');
        $cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,gender,stylename,color_name,cart_blurb')->first();
        if(!empty($cart)){
            $cart_total = $cart->total;
            if ($delivery_option == 'express') {
                $freight_charges = '15';
                //config('site.freight_cost')
            } else if ($delivery_option == 'new_zealand') {
                $freight_charges = 25;
            } else {
                if ($cart_total <= 50) {
                    $freight_charges = 10;
                } else {
                    $freight_charges = '0.00';
                }
            }
            echo session('cart_id');
            $UpdateDetails = Cart::where('id', session('cart_id'))->update(['delivery_type' => $delivery_option, 'freight_cost' => $freight_charges, 'grand_total' => $freight_charges + $cart->total]);
            $this->calculate_and_update_gift_voucher_details();
            echo "success";
        }
    }

    public function calculate_and_update_gift_voucher_details(){
        $cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,gender,stylename,color_name,cart_blurb')->first();
        echo "aaaaaaaaaaaaaaaa";
        if(!empty($cart)){
            echo "eeeeeeeeeeeeeee";die;
            if ($cart->gift_pin != "") {
                $AvailableAmount = $cart->gift_available_amount;
                $cartTotal = $cart->cart_total;
                $freight_cost = $cart->freight_cost;
                if ($AvailableAmount > ($cartTotal + $freight_cost)) {
                    $gift_discount = ($cartTotal + $freight_cost);
                    $gift_cart_total = 0;
                } else {
                    $gift_discount = $AvailableAmount;
                    $gift_cart_total = ($cartTotal + $freight_cost) - $AvailableAmount;
                }
                Cart::where('id', session('cart_id'))->update(['gift_discount' => $gift_discount, 'gift_cart_total' => $gift_cart_total]);
                $cart = Cart::where('id', session('cart_id'))->where('gift_id', $cart->gift_id)->with('cartItems.variant.product:id,gender,stylename,color_name,cart_blurb')->first();
            }
        }
    }

    public function get_cart_order_total() {
        $cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,gender,stylename,color_name,cart_blurb')->first();
        if(!empty($cart)){
            if ($cart->gift_pin != "") {
                $AvailableAmount = $cart->gift_available_amount;
                $cartTotal = $cart->cart_total;
                $freight_cost = $cart->freight_cost;
                if ($AvailableAmount > ($cartTotal + $freight_cost)) {
                    $gift_discount = ($cartTotal + $freight_cost);
                    $gift_cart_total = 0;
                } else {
                    $gift_discount = $AvailableAmount;
                    $gift_cart_total = ($cartTotal + $freight_cost) - $AvailableAmount;
                }
                Cart::where('id', session('cart_id'))->update(['gift_discount' => $gift_discount, 'gift_cart_total' => $gift_cart_total]);
                $cart = Cart::where('id', session('cart_id'))->where('gift_id', $cart->gift_id)->with('cartItems.variant.product:id,gender,stylename,color_name,cart_blurb')->first();
            }
        }
        return view('cart.order_summary', compact('cart'));
    }

    public function edit_cart_popup(Request $request) {
        /* $cart_items['prod_details'] = Cart::where('carts.id', session('cart_id'))->where('variant_id', $request->variant_id)->join('cart_items', 'carts.id', '=', 'cart_items.cart_id')->with('cartItems.variant.product:id,stylename,color_name')->get();
          $cart_items['cart_details'] = Cart::where('carts.id', session('cart_id'))->join('cart_items', 'carts.id', '=', 'cart_items.cart_id')->where('variant_id', $request->variant_id)->get();
         */
        $cart_items = Cart_item::where('cart_id', session('cart_id'))->where('variant_id', $request->variant_id)->with('variant.product.image')->get();
        return response()->json([
                    'cartitemshtml' => view('cart.edit_cart_popup', compact('cart_items'))->render()
        ]);
    }

    public function remove_gift_voucher(Request $request) {
        Cart::where('id', session('cart_id'))->update(['gift_id' => '', 'pin' => '', 'gift_available_amount' => '0.00', 'gift_discount' => '0.00', 'gift_cart_total' => '0.00']);
        echo "success";
    }

    public function check_gift_voucher() {
        $cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,gender,stylename,color_name,cart_blurb')->first();
        if(!empty($cart)){
            $cartTotal = $cart->total;
            $freight_cost = $cart->freight_cost;

            $giftcert_code = $cart->gift_id;
            $giftcert_pin = $cart->pin;
            $vouchervalid = $this->bridgeObject->vouchervalid($giftcert_code, $giftcert_pin, $cartTotal+$freight_cost)->getBody()->getContents();
    
    
            $response = $this->bridgeObject->vouchervalid($giftcert_code, $giftcert_pin, $cartTotal+$freight_cost);
            $returnCode = $response->getStatusCode();
    
            switch ($returnCode) {
                case 200:
                    $response_body = $response->getBody()->getContents();
                    $xml = simplexml_load_string($vouchervalid);
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
                    Cart::where('id', session('cart_id'))->update(['gift_id' => $gift_number, 'pin' => $gift_pin, 'gift_available_amount' => $AvailableAmount, 'gift_discount' => $gift_discount, 'gift_cart_total' => $gift_cart_total]);
                    break;
            }
        }
    }

    public function check_valid_gift_voucher(Request $request) {
        $cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,gender,stylename,color_name,cart_blurb')->first();
        if(!empty($cart)){
            $cartTotal = $cart->total;
            $freight_cost = $cart->freight_cost;

            $giftcert_code = $request->voucher_number;
            $giftcert_pin = $request->voucher_pin;
            $vouchervalid = $this->bridgeObject->vouchervalid($giftcert_code, $giftcert_pin, $cartTotal+$freight_cost)->getBody()->getContents();
    
            $response = $this->bridgeObject->vouchervalid($giftcert_code, $giftcert_pin, $cartTotal+$freight_cost);
            $returnCode = $response->getStatusCode();
            switch ($returnCode) {
                case 200:
                    $response_body = $response->getBody()->getContents();
                    //print_r($response_body);
                    $xml = simplexml_load_string($vouchervalid);
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
                    //$cart_total = $gift_cart_total + $cart_mast['freight_charges'];
                    Cart::where('id', session('cart_id'))->update(['gift_id' => $gift_number, 'pin' => $gift_pin, 'gift_available_amount' => $AvailableAmount, 'gift_discount' => $gift_discount, 'gift_cart_total' => $gift_cart_total]);
    
                    echo "success";
                    break;
                case 403 :
                    echo "Incorrect Voucher";
                    break;
                default:
                    echo "<hr>HTTP ERROR -> " . $returnCode . "<br>" . $response->getBody();
                    break;
            }
        }
    }

    public function couponvalidate(Request $request) {
        //echo "<pre>";print_r($check_promo_code);die;

        $check_promo_code = promo_mast::where('promo_string', $request->promo_code)->whereRaw('CURDATE() between `start_dt` and `end_dt`')->first();
        if ($request->promo_code == "") {
            $promotion['msg'] = 'Please enter Discount Code';
        } else if (isset($check_promo_code) && $check_promo_code != "") {
            Cart::where('id', session('cart_id'))->update(['promo_code' => $request->promo_code, 'promo_string' => $check_promo_code->promo_string, 'sku' => $check_promo_code->skuidx]);
            $promotion ['result'] = 'success';
            $promotion['msg'] = 'Valid Code';
            $promotion['url'] = 'cart';
            $promotion['redirect'] = 1;
        } else {
            $promotion ['result'] = 'fail';
            $promotion['msg'] = 'Discount Code is not valid';
            $promotion['redirect'] = 0;
        }
        echo json_encode($promotion);
    }

    public function removecoupon(Request $request) {
        Cart::where('id', session('cart_id'))->update(['promo_code' => '', 'promo_string' => '', 'sku' => 0]);
        return redirect('cart');
    }

}
