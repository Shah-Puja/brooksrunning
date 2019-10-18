<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shoefinder_user;
use App\Models\Cart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $shoefinder_user_details;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        /*** Shoefinder save ****/
        $shoefinder_user_details = Shoefinder_user::where('user_id', auth()->id())->first();
        if(!empty($shoefinder_user_details) && session('shoefinder_completed')=='Y' && session('shoefinder_user_id')!=''){
                Shoefinder_user::where('user_id',auth()->id())->where('id','!=',session('shoefinder_user_id'))->delete();
                Shoefinder_user::where('id' ,session('shoefinder_user_id'))->update(['user_id' => auth()->id()]);
        }else if(session('shoefinder_completed')=='Y' && session('shoefinder_user_id')!=''){
            Shoefinder_user::where('id' ,session('shoefinder_user_id'))->update(['user_id' => auth()->id()]);
        }
        $shoefinder_user_details = Shoefinder_user::where('user_id', auth()->id())->first();
        /******/

        if(auth()->user()->loyalty_type== 'PPP'){
            $page = 'loyalty-home';
        }else{
            $page = 'home';
        }

        /*$cart = Cart::where('user_id', auth()->id())->orderBy('id','DESC')->first();
        if (isset($cart)) {
            session()->put('cart_id', $cart->id);
        }*/
        
        return view($page,compact('shoefinder_user_details'));
    }

}
