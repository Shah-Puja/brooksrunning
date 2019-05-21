<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            //'email' => 'required|string|email|max:255|unique:users',
            'email' => [
                'required',
                Rule::unique('users')->where(function ($query) {
                    $query->where('user_type', 'User');
                }),
            ],
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
            'gender' => 'sometimes|required|in:Male,Female',
            'birthday_date' => '',
            'birthday_month' => '',
            'age_group' => '',
            'state' => 'sometimes|required',
            'postcode' => 'sometimes|required|numeric',
            'newsletter_subscription' => '',
            'source' => '',
            'user_type' => '', 
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user =  User::updateorcreate(
            ['email' => $data['email'] ],
            [
            'first_name' => (isset($data['first_name'])) ? $data['first_name'] : '',
            'last_name' => (isset($data['last_name'])) ? $data['last_name'] : '',
            'password' => Hash::make($data['password']),
            'gender' => (isset($data['gender'])) ? $data['gender'] : null,
            'birth_date' => (isset($data['birthday_date'])) ? $data['birthday_date'] : null,
            'birth_month' => (isset($data['birthday_month'])) ? $data['birthday_month'] : null,
            'age_group' => (isset($data['age_group'])) ? $data['age_group'] : '',
            'state' => (isset($data['state'])) ? $data['state'] : '',
            'postcode' => (isset($data['postcode'])) ? $data['postcode'] : null,
            'newsletter' => @$data['newsletter_subscription'] ? 1 : 0, 
            'user_type' => "User",      
        ]);

        if($user->wasRecentlyCreated){
            $user->update(['source' => (isset($data['source'])) ? $data['source'] : 'User']);
        }
        return $user;
    }
}
