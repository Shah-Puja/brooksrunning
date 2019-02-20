<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Order;
use App\Models\Order_address;
use Illuminate\Database\Eloquent\Model;

class MyaccountController extends Controller {

    public function account_homepage() {
        return view('customer.myaccount.account-homepage');
    }

    public function account_order_history() {
        if(auth()->id()=="") {
            return redirect('login');
        }else{
            $user_order_details = Order::where('user_id', auth()->id())
                ->where('status','Completed')
                ->orderBy('updated_at', 'desc')
                ->with('address')->get(); 
            return view('customer.myaccount.account-order-history', compact('user_order_details'));
        }
    }

    public function view_order(Request $request) {
        /* echo "<pre>"; 
          print_r($request->order_id); */
        $order_item_detail = Order::where('id', $request->order_id)->with('orderItems.variant.product')->get();
        $order = $order_item_detail[0];
        /* echo "<pre>"; 
          print_r($order_item_detail);die; */
        return response()->json([
                    'orderitemshtml' => view('customer.myaccount.view_order_popup', compact('order'))->render()
                        //'orderitemshtml' => view('customer.myaccount.view_order_popup')->render()
        ]);
    }

    public function account_personal() {
        //User::where('email', $this->order->address->email)->update(['person_idx'=> $PersonID]);
        return view('customer.myaccount.account-personal');
    }

    public function order_history() {
        return view('customer.myaccount.order-history');
    }

    public function confirm_password() {
        return view('customer.myaccount.confirm-password');
    }

    public function update_profile(Request $request) {
        /* echo "<pre>"; 
          print_r($request->all());die; */
        User::where('id', auth()->id())->update(['first_name' => isset($request->first_name) ? $request->first_name : "",
            'last_name' => isset($request->last_name) ? $request->last_name : "",
            'gender' => isset($request->gender) ? ucfirst($request->gender) : NULL,
            'dob' => (isset($request->birth_month) && isset($request->birth_date)) ? $request->birth_month . "-" . $request->birth_date : "0",
            'birth_date' => (isset($request->birth_date)) ? $request->birth_date : "0",
            'birth_month' => (isset($request->birth_month)) ? $request->birth_month : "0",
            'age_group' => (isset($request->age_group)) ? $request->age_group : "",
            'state' => isset($request->state) ? $request->state : "",
            'postcode' => isset($request->postcode) ? $request->postcode : "0",
            'shoe_wear' => isset($request->shoe_wear) ? $request->shoe_wear : '', 
            'newsletter' => @$request->newsletter ? 1 : 0
        ]);
        if(isset($request->password) && $request->password!=""){
            User::where('id', auth()->id())->update(['password' => Hash::make($request->password) ]);
        }
        return redirect('account-personal');
    }

    public function make_member() {
        $email = $_POST['user_email'];
        $password = Hash::make($_POST['pass']);
        User::where('email', $email)->update(['password' => $password,'user_type' => 'User']);
    }

}
