<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_address;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class BillingShippingController extends Controller
{    
    protected $cart;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            //$this->cart = Cart::where( 'id', session('cart_id') )->first();
            $this->cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,style,stylename,color_name')->first();
            //echo "<pre>";print_r($this->cart);die;
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
        //  echo "<pre>";
        //  print_r($this->cart);
        //  echo "</pre>";
        //  exit;
        Order::createNew($this->cart, $validatedAddress);
        
        return redirect("payment");
    }

    public function check_email(Request $email){

        $email= $_POST['email'];
        $user = DB::table('users')->where("email", "=",  $email)->get();
        $count = count($user);
        if($count > 0){
            echo "true";
            //return true;
        }else{
            echo "false";
            //return false;
        }
         
    }
}