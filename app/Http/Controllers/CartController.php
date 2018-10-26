<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_item;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use App\SYG\Bridges\BridgeInterface as Bridge;

class CartController extends Controller {

    protected $carObject;

    public function __construct(Bridge $b) {
        $this->bridgeObject = $b;
    }

    public function show() {
        //session(['cart_id' => '1']); //comment this static after add to cart functionality
        //echo "<pre>";print_r(session()->all());die;
        $cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,stylename,color_name')->first();

        if (isset($cart) && !empty($cart)) {
            foreach ($cart->cartItems as $cart_item) {

                $cart['items_count'] += $cart_item->qty;
            }
        }
        // echo "<pre>";print_r($cart);die;
        if ($cart && !$cart->verifyItems()) {
            $cart->deleteUnavaliableItems();
        }
        
        if (App::environment('staging')) {
            $cart_details = $skuidx_arr = array();
            if (!empty($cart)) {
                foreach ($cart->cartItems as $row) {
                    $skuidx_arr[] = $row->variant_id;
                }
                /* echo "<pre>";
                  print_r($cart);
                  die; */

                $data = $this->cart_api($cart);
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
                        Cart_item::where('variant_id', $item['SkuId'])->where('cart_id', session('cart_id'))->update(['price_sale' => $cart_api_price_sale]);
                    }
                endforeach;
            }
        }
        /* echo $cart_total;
          die; */
        //return $data;
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
            foreach ($cart->cartItems as $item) {
                $sku = $item->variant_id;
                $qty = $item->qty;
                $cart_xml .= "		<CartDetail>		
									<SkuId>$sku</SkuId>
									<Quantity>$qty</Quantity>
								</CartDetail>\n\t";
            }
            $cart_xml .= "
                            </CartDetails>
						</Cart>";

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
                $delivery_option = $cart->delivery_type;
                if ($delivery_option == 'new_zealand') {
                    $freight_charges = config('site.SHIPPING_NZ_PRICE');
                } elseif ($delivery_option == 'standard') {
                    if ($cart_total - $xml_freight_charges <= config('site.SHIPPING_SET_LIMIT')) {
                        $freight_charges = config('site.SHIPPING_SET_PRICE');
                    } else {
                        $freight_charges = '0';
                    }
                } else {
                    if (!empty($cart_mast_detail)) {
                        $freight_charges = $cart->freight_cost;
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
        $cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,stylename,color_name')->first();

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
        echo "success";
    }

    public function get_cart_order_total() {
        $cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,stylename,color_name')->first();
        return view('cart.order_summary', compact('cart'));
    }

    public function edit_cart_popup(Request $request) {
        /* $cart_items['prod_details'] = Cart::where('carts.id', session('cart_id'))->where('variant_id', $request->variant_id)->join('cart_items', 'carts.id', '=', 'cart_items.cart_id')->with('cartItems.variant.product:id,stylename,color_name')->get();
          $cart_items['cart_details'] = Cart::where('carts.id', session('cart_id'))->join('cart_items', 'carts.id', '=', 'cart_items.cart_id')->where('variant_id', $request->variant_id)->get();
         */
        $cart_items = Cart::where('carts.id', session('cart_id'))->where('ci.variant_id', $request->variant_id)->
                        join('cart_items as ci', 'carts.id', '=', 'ci.cart_id')->
                        join('p_variants as pv', 'pv.id', '=', 'ci.variant_id')->
                        join('p_products as pp', 'pp.id', '=', 'pv.product_id')->with('cartItems.variant.product:id,stylename,color_name')->get();
        // echo "<pre>";print_r($cart_items);
        //return view('cart.edit_cart_popup', compact('cart_items'));
        return response()->json([
                    'cartitemshtml' => view('cart.edit_cart_popup', compact('cart_items'))->render()
        ]);
    }

}
