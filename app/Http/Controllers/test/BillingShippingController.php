<?php

namespace App\Http\Controllers\test;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_address;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BillingShippingController extends Controller
{
    protected $cart;
    public function __construct()
    { 
        $this->middleware(function ($request, $next) {
            $this->cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,style,stylename,color_name')->first();
            if(empty($this->cart) || $this->cart->cartItems->count() < 1)  return redirect('cart');
            return $next($request);
        });
    }

    public function create()
    {
        if (@$this->cart->order->address) $orderAddress = $this->cart->order->address;

        if (!@$orderAddress && auth()->check() ) {
            $usersLastOrder = Order::where('user_id', auth()->id())
                                    ->orderBy('updated_at', 'desc')
                                    ->first();
            $orderAddress = $usersLastOrder ? $usersLastOrder->address : null; 
        }

        if (!@$orderAddress)  $orderAddress = new Order_address;

        return view( 'customer.shipping', ['orderAddress'=>$orderAddress,'cart'=> $this->cart]);
    }

    public function store()
    {        
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

        $order_id = Order::createNew($this->cart, $validatedAddress);
        //check_state_and_update_delivery_option($order_id);

        return redirect("payment"); 
    }

    public function check_email()
    {
        $user = User::where("email",request()->email)
                      ->where("user_type","User")
                      ->first();
        if($user){
            echo "true";
        }else{
            echo "false";
        }   
    }

    public function verify_password(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return "true";
        }else{
            return "false";
        }
    }

    public function verify_medibank_login(Request $request)
    {
        // Verification process is pending here
        if($request->medibank_email != "" && $request->medibank_id!=""){
            echo "success";
        }else{
            echo "failed";
        }
    }
}
