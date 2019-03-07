<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_address;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Auth;


class BillingShippingController extends Controller
{    
    protected $cart;
    public function __construct()
    { 
        $this->middleware(function ($request, $next) {
            //$this->cart = Cart::where( 'id', session('cart_id') )->first();
            $this->cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,style,stylename,color_name')->first();
            if(isset($this->cart->order->address->s_state) && $this->cart->order->address->s_state=='New Zealand'){
                $delivery_option = "new_zealand";
                $freight_charges = config('site.SHIPPING_NZ_PRICE');
                $grand_total = $this->cart->total + $freight_charges;
                Cart::where('id', session('cart_id'))->update(['delivery_type' => $delivery_option, 'freight_cost' => $freight_charges, 'grand_total' => $grand_total]);
                $this->cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,style,stylename,color_name')->first();
                Order::where('user_id', auth()->id())->update(['delivery_type' => $delivery_option, 'freight_cost' => $freight_charges, 'grand_total' => $grand_total]);
            }
            if(empty($this->cart)){
                return redirect('cart');
            }
            foreach($this->cart->cartItems as $cart_item){
                $this->cart['items_count'] += $cart_item->qty;
            }
            if ( ! $this->cart || $this->cart->items_count < 1 ) {
                return redirect('cart');
            }
            return $next($request);
        });
    } 

    public function create()
    {
        $cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,stylename,color_name')->first();
        
        if (@$this->cart->order->address) {
            $orderAddress = $this->cart->order->address;
        }
        if (! @$orderAddress && auth()->check() ) {
            $usersLastOrder = Order::where('user_id', auth()->id())
                                ->orderBy('updated_at', 'desc')
                                ->first();
            if(isset($usersLastOrder->address->s_state) && $usersLastOrder->address->s_state=='New Zealand'){
                $delivery_option = "new_zealand";
                $freight_charges = config('site.SHIPPING_NZ_PRICE');
                $grand_total = $this->cart->total + $freight_charges;
                Cart::where('id', session('cart_id'))->update(['delivery_type' => $delivery_option, 'freight_cost' => $freight_charges, 'grand_total' => $grand_total]);
                $this->cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,style,stylename,color_name')->first();
                Order::where('user_id', auth()->id())->update(['delivery_type' => $delivery_option, 'freight_cost' => $freight_charges, 'grand_total' => $grand_total]);
            }
            $orderAddress = $usersLastOrder ? $usersLastOrder->address : null; 
        }
        if (! @$orderAddress) {
            $orderAddress = new Order_address;
        }

        return view( 'customer.shipping', compact('orderAddress','cart') );
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
            'b_add2' => '',
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
        
        //  echo "<pre>";
        //  print_r($validatedAddress);
        //  echo "</pre>";
        //  exit;
        
        $user_id = $this->cart->user_id;
        if(auth()->user()){
            if($this->cart['user_id']==''){
                $user_data = User::where("email","=",$validatedAddress['email'])->first();
                //$user_id = $user_data->id;
                $user_id = (!empty($user_data) && isset($user_data->id)) ? $user_data->id : '';
            }
        }
        Order::createNew($this->cart, $user_id, $validatedAddress);
        return redirect("payment");
    }

    public function check_email(){
        $email= request()->email;
        $user = User::where("email", "=",  $email)
        ->where("user_type", "=",  'User')
        ->first();
        if($user){
            echo "true";
        }else{
            echo "false";
        }   
    }


    public function verify_password(Request $request){
        //$email= $request->email;
        //$password= $request->password;
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return "true";
        }else{
            return "false";
        }
        /*$user_data = User::where("email", "=",  $email)->first();
        $password_check = Hash::check($password,$user_data->password);
        if($password_check){
            $user_verify = User::where("email", "=",  $email)->where("password",$user_data->password)->first();
            if($user_verify){
                $orderadd_data = Order_address::where("email", "=",  $email)->orderBy('id', 'desc')->first();
                if($orderadd_data){
                    $orderadd_data['pass_data'] = 'order_address';
                    $orderadd_data['pass_status'] = 'true';
                    return $orderadd_data;
                }else{
                    $user_verify['pass_data'] = 'user';
                    $user_verify['pass_status'] = 'true';
                    return $user_verify;
               }            
            }else{
                 return 'false';
            }
        }else{
            return 'false';
        }*/
    }

    public function verify_medibank_login(Request $request){
        //echo "<pre>";print_r($request->all());die;
        if($request->medibank_email != "" && $request->medibank_id!=""){
            echo "success";
        }else{
            echo "failed";
        }
    }

}
