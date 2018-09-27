<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_address;
use Illuminate\Database\Eloquent\Model;

class BillingShippingController extends Controller
{    

    public function index(){
        return view('customer.shipping');
    }

    public function store(){
        $validatedAddress = request()->validate([
    		'email' => 'required|email',
    		's_fname' => 'required',    		
    		's_lname' => 'required',
     		's_add1' => 'required',
            's_add2' => '',
            's_city' => 'required',
            's_state' => 'required',
            's_postcode' => 'required|numeric',
            's_phone' => 'required|regex:/^(?=.*[0-9])[- +()0-9]+$/',
            'b_fname' => 'required_if:flag_same_shipping,No',
            'b_lname' => 'required_if:flag_same_shipping,No',
            'b_add1' => 'required_if:flag_same_shipping,No',
            'b_add2' => 'required_if:flag_same_shipping,No',
            'b_city' => 'required_if:flag_same_shipping,No',
            'b_state' => 'required_if:flag_same_shipping,No',
            'b_postcode' => 'required_if:flag_same_shipping,No|nullable|numeric',
            'b_phone' => 'required_if:flag_same_shipping,No|nullable|regex:/^(?=.*[0-9])[- +()0-9]+$/',
            'terms' => 'accepted',
            'order_info' => '',
            'nosignaturedelivery' => '',
            'signme' => '',
            'flag_same_shipping' => '',
        ]);
        $cart=array(
            'user_id'=>'1234',
            'id'=>'1',
            'total'=>'100.00',
            'freight_cost'=>'0',
            'grand_total'=>'105.00'
        );
        //Order::createNew($this->cart, $validatedAddress);
        Order::createNew($cart, $validatedAddress);

        return redirect("payment");
    }
}
