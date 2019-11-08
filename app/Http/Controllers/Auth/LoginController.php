<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $user=User::where('email',request('email'))
        ->where('user_type','!=','User')->first();
        if($user) return redirect('login')->withErrors(['email' => 'You are not registered with us.']);
      

        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }    

    /*public function login_old(Request $request)
    {
        //echo "aaa";
        //exit;
        $email=request('email');
        $password=request('password');

        //echo "aaa - $email ";
        //exit;
        //$credentials = $request->only('email', 'password');
        if (Auth::attempt(['email' => $email, 'password' => $password, 'user_type' => 'User'])){
        //if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('home');
        }
    }*/

    protected function authenticated(Request $request, $user)
    {   
        $request->session()->forget('cart_id');
        $guest_cart_id = $request->session()->get('guest_cart_id');
        $cart = Cart::where('user_id', auth()->id())->orderBy('id','desc')->first();
        if (isset($cart) && !empty($cart)) {
            $request->session()->put('cart_id', $cart->id);
            $guest_Cart = Cart::where('id', $guest_cart_id)->orderBy('id','desc')->first();
            if (isset($guest_Cart) && !empty($guest_Cart)) {
                if($guest_Cart->promo_string!=''){
                    $guest_Cart->cartItems()
                                //->where('discount_detail','>','0')
                                ->update([
                                    'cart_id' => $cart->id,
                                    'discount_detail' => '0', 
                                    'discount_price' => DB::raw("price_sale*qty"),
                            ]);
                }else{
                    $guest_Cart->cartItems()->update([ 'cart_id' => $cart->id ]);
                }
                $cart->load('cartItems.variant.product:id,gender,stylename,color_name,cart_blurb');
                $cart->total = $cart->cartItems()->sum('price_sale') * $cart->cartItems()->sum('qty');
                $cart->discount = $cart->cartItems()->sum('discount_detail');
                $cart->grand_total = $cart->cartItems()->sum('discount_price');
                $cart->save();
            }
            Cache::forget('cart' . $cart->id);
        }else{
            $request->session()->forget('cart_id');
            $guest_Cart = Cart::where('id', $guest_cart_id)->first();
            $guest_Cart->user_id = auth()->id();
            $guest_Cart->save();
            $request->session()->put('cart_id', $guest_Cart->id);
            $request->session()->forget('guest_cart_id');
            Cache::forget('cart' . $guest_Cart->id);
        }
    }
    protected function sendLoginResponse(Request $request)
    {   
        $cart_id = $request->session()->get('cart_id');
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);
        $request->session()->put('guest_cart_id', $cart_id);
        $request->session()->put('cart_id', $cart_id);
        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }
}
