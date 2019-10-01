<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;
use App\SYG\Bridges\BridgeInterface;
use App\Models\Ap21_error;

class RegisterController extends Controller {

    protected $bridge;

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
    public function __construct(BridgeInterface $bridge) {
        $this->middleware('guest');
        $this->bridge = $bridge;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'first_name' => 'sometimes|required|string|max:255',
                    'last_name' => 'sometimes|required|string|max:255',
                    //'email' => 'required|string|email|max:255|unique:users',
                    'email' => [
                            'required', $this->check_rule($data),
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
                    'practice_name' => 'sometimes|required',
                    'health_practitioner' => 'sometimes|required',
                    'loyalty_type' => '',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data) {
        $PersonID = 0;
        $user = User::updateorcreate(
                        ['email' => $data['email']], [
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
                    'source' => (isset($data['source'])) ? $data['source'] : 'User',
                    'practice_name' => (isset($data['practice_name'])) ? $data['practice_name'] : '', // field for loyalty register user
                    'health_practitioner' => (isset($data['health_practitioner'])) ? $data['health_practitioner'] : '', // field for loyalty register user
                    'loyalty_type' => (isset($data['loyalty_type'])) ? $data['loyalty_type'] : '', // field for loyalty register user
        ]);

        $icontact_pushmailuser = DB::table('icontact_pushmail')->insert(
                ['email' => $data['email'],
                    'fname' => (isset($data['first_name'])) ? $data['first_name'] : '',
                    'lname' => (isset($data['last_name'])) ? $data['last_name'] : '',
                    'gender' => (isset($data['gender'])) ? $data['gender'] : null,
                    'birth_day' => (isset($data['birthday_date'])) ? $data['birthday_date'] : null,
                    'birth_month' => (isset($data['birthday_month'])) ? $data['birthday_month'] : null,
                    'age_group' => (isset($data['age_group'])) ? $data['age_group'] : '',
                    'state' => (isset($data['state'])) ? $data['state'] : '',
                    'postcode' => (isset($data['postcode'])) ? $data['postcode'] : null,
                    'shoe_wear' => (isset($data['shoe_wear'])) ? $data['shoe_wear'] : null,
                    'source' => "User",
                    'status' => 'queue',
                    'list_id' => env('ICONTACT_LIST_ID'), //common list of users - BR Users in iContact
        ]);

        // if ($user->wasRecentlyCreated) {
        //     if (env('AP21_STATUS') == 'ON') {
        //         $PersonID = $this->get_personid($data['email'], (isset($data['first_name'])) ? $data['first_name'] : '', (isset($data['last_name'])) ? $data['last_name'] : '', (isset($data['gender'])) ? $data['gender'] : null, (isset($data['state'])) ? $data['state'] : '',(isset($data['loyalty_type'])) ? $data['loyalty_type'] : '');
        //         $user->update(['person_idx' => $PersonID]);
        //     }            
        // }

        if (env('AP21_STATUS') == 'ON') {
            if(isset($data['loyalty_type']) && $data['loyalty_type']=='PPP'){
                if($user->person_idx){
                    $this->update_ap21_person($data['email']);
                }                
                else{
                    $PersonID = $this->get_personid($data['email'], (isset($data['first_name'])) ? $data['first_name'] : '', (isset($data['last_name'])) ? $data['last_name'] : '', (isset($data['gender'])) ? $data['gender'] : null, (isset($data['state'])) ? $data['state'] : '',(isset($data['loyalty_type'])) ? $data['loyalty_type'] : '');
                    $user->update(['person_idx' => $PersonID]);                        
                }
            }    
            else{
                if ($user->wasRecentlyCreated) {
                    $PersonID = $this->get_personid($data['email'], (isset($data['first_name'])) ? $data['first_name'] : '', (isset($data['last_name'])) ? $data['last_name'] : '', (isset($data['gender'])) ? $data['gender'] : null, (isset($data['state'])) ? $data['state'] : '',(isset($data['loyalty_type'])) ? $data['loyalty_type'] : '');
                    $user->update(['person_idx' => $PersonID]);
                }
            }        
        }
        return $user;
    }

    public function check_rule($data){
        $rule ='';
        if(!isset($data['loyalty_type'])){
            $rule = Rule::unique('users')->where(function ($query) {
                $query->where('user_type', 'User');
            });
        }
        return $rule;
    }

    public function update_ap21_person($email){
        $response = $this->bridge->getPersonid($email);
        if (!empty($response)) {
            $returnCode = $response->getStatusCode();
            $userid = false;
            switch ($returnCode) {
                case '200':
                    $response_xml = @simplexml_load_string($response->getBody()->getContents());
                    // if(in_array("29441", $response_xml->Person->Loyalties->Loyalty)) {
                    //     echo "exist";
                    // }else{
                    //     echo "not exist";
                    // }

                    //print_r(collect($response_xml->Person->Loyalties->Loyalty));
                            if(isset($response_xml->Person->Loyalties->Loyalty)):
                                echo "in if";
                              $filtered =  collect($response_xml->Person->Loyalties->Loyalty)->search(function ($item, $key) {
                                            return ($item->LoyaltyTypeId==env('LOYALTY_ID'));
                                            });
                            else:
                                echo "out if";
                                $filtered =  0;
                            endif;
                    echo "filtered".$filtered;
                    exit;
                    break;  
            }
        }       
    }
    public function get_personid($email, $fname = '', $lname = '', $gender = '', $state = '' , $loyalty = '') {
        $response = $this->bridge->getPersonid($email);
        if (!empty($response)) {
            $returnCode = $response->getStatusCode();
            $userid = false;
            switch ($returnCode) {
                case '200':
                    $response_xml = @simplexml_load_string($response->getBody()->getContents());
                    $userid = $response_xml->Person->Id;
                    break;

                case '404':
                    $userid = $this->create_user($email, $fname, $lname, $gender, $state , $loyalty);
                    break;

                default:
                    $url = env('AP21_URL') .'Persons/?countryCode=AUFIT&email=' . $email; 
                    $error_response = $response->getBody()->getContents();
                    Ap21_error::store([
                        'api' => 'GET Person-API/Register',
                        'url' => $url,
                        'http_error' => $returnCode,
                        'error_response' =>  $error_response,
                        'error_type' => 'API Error',
                    ]);
                    $userid = false;
                    break;
            }
        } /*else {
            $userid = $this->create_user($email, $fname, $lname, $gender, $state);
        }*/

        return $userid;
    }

    public function create_user($email, $fname = '', $lname = '', $gender = '', $state = '', $loyalty = '') {

        $returnVal = false;
        if (isset($gender) && $gender == "Male") {
            $gender = "M";
        } elseif (isset($gender) && $gender == "Female") {
            $gender = "F";
        }
        $xml_passing_array = [
            'fname' => $fname,
            'lname' => $lname,
            'gender' => $gender,
            'email' => $email,
            'state' => $state,
            'loyalty' => $loyalty
        ];
        $person_xml = view('xml.person_xml',['data'=>$xml_passing_array]);
        $response = $this->bridge->processPerson($person_xml);
        if (!empty($response)) {
            $returnCode = $response->getStatusCode();
            switch ($returnCode) {
                case 201:
                    $location = $response->getHeader('Location')[0];
                    $str_arr = explode("/", $location);
                    $last_seg = $str_arr[count($str_arr) - 1];
                    $last_seg_arr = explode("?", $last_seg);
                    $person_idx = $last_seg_arr[0];
                    $returnVal = $person_idx;
                    break;

                default:
                    $url = env('AP21_URL') . "Persons/?countryCode=" . env('AP21_COUNTRYCODE');
                    $error_response = $response->getBody()->getContents();
                    Ap21_error::store([
                        'api' => 'POST Person-API/Register',
                        'url' => $url,
                        'error_response' => $error_response,
                        'error_type' => 'API Error',
                        'body' =>  $person_xml
                    ]);
                    $returnVal = false;
                    break;
            }
        }
        return $returnVal;
    }

    public function loyalty_register(){
        return view ('auth.loyalty-register');
    }

}
