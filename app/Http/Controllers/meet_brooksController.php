<?php

namespace App\Http\Controllers;

use App\Rules\Recaptcha;
use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\Competition_user;
use App\SYG\Bridges\BridgeInterface;
use App\Models\User;

class meet_brooksController extends Controller
{   
    protected $bridge;
    public function __construct(BridgeInterface $bridge) {
        $this->bridge = $bridge;
    }
    public function index($meet_brooks_pg){
        if(!view()->exists('meet_brooks.'.$meet_brooks_pg)){
           return abort(404);
        }
        return view('meet_brooks.'.$meet_brooks_pg);
    }

    public function competition($slug){
        $competition = Competition::where('slug',$slug)->first();
        if(!$competition){
            return abort(404);
        }
        if(!view()->exists('meet_brooks.competition.'.$competition->comp_form)){
            return abort(404);
         }
        return view('meet_brooks.competition.competition',compact('comp_name','competition'));

    }

    public function store(Recaptcha $recaptcha)
	{  
    	request()->validate([
            'fname' => 'required',
            'lname' => 'required',
    		'gender' => 'required',    		
            'email' => 'required|email',
     		'country' => 'required',
            'postcode' => 'required',
            'g-recaptcha-response' => ['required', $recaptcha],
            ]);

    	$competition = Competition_user::firstOrCreate(
            [ 'email' => request('email'),'comp_name' => request('comp_name')],
            [
                'comp_slug' => request('comp_slug'),
                'fname' => request('fname'),
                'lname' => request('lname'),
                'gender' => request('gender'),
                'dob' => request('custom_Birth_Month').'-'.request('custom_Birth_Date'),
                'age_group' => request('custom_Age'),
                'postcode' => request('postcode'),
                'shoe_wear' => request('custom_Shoes_you_wear'),
                'country' => request('country'),
                'answer'=>request('custom_Answer')
            ]
        );

        //ap21 order process 
        $Person = User::firstOrCreate(['email' => request('email')], 
                                      ['fname' => request('fname'),
                                       'lname' => request('lname'),
                                       'tag' => request('comp_name'),
                                       'gender' => request('gender'),
                                       'dob' => request('custom_Birth_Month').'-'.request('custom_Birth_Date'),
                                       'age_group' => request('custom_Age'),
                                       'postcode' => request('postcode'),
                                       'shoe_wear' => request('custom_Shoes_you_wear'),
                                       'source' => 'Competition',
                                       'user_type' => 'Competition']);
        if (isset($Person)) {
            $PersonID = ($Person->person_idx != '') ? $Person->person_idx : '';
        }
        if (env('AP21_STATUS') == 'ON') {
            if (empty($PersonID)) {
                $PersonID = $this->get_personid(request('email'),request('fname'),request('lname'),request('gender'),request('country'));
            } 
            if(!empty($PersonID)){
                User::where('email',request('email'))->update(['person_idx' => $PersonID ]);
            }
        } 
        
        if($competition->wasRecentlyCreated){
            return response()->json([ 'success' => '<p class="heading">Thank you! </p> <p class="thankyou_heading">Thanks for entering. Good Luck! </p>' ]);
        }else{
            return response()->json([ 'success' => '<p class="heading">Thank for your interest! </p> <p class="thankyou_heading">You have already entered the competition.</p>' ]);
        }

	}
    public function roadtester()
	{
		return view( 'meet_brooks.roadtester');
    }

    public function get_personid($email, $fname = '', $lname = '', $gender = '', $country='') {

        $response = $this->bridge->getPersonid($email);
        //print_r($response);
        //exit;      
        $returnCode = $response->getStatusCode();
        $userid = false;
        switch ($returnCode) {
            case '200':
                $response_xml = @simplexml_load_string($response->getBody()->getContents());
                $userid = $response_xml->Person->Id;
                break;

            case '404':
                $userid = $this->create_user($email, $fname, $lname, $gender, $country);
                break;
             
            default:
                $userid = false;
                break;
        }
        return $userid;
    }

    public function create_user($email, $fname = '', $lname = '', $gender = '', $country='') {

        $person_xml = "<Person>
                        <Firstname>$fname</Firstname>
                        <Surname>$lname</Surname>   
                        <Sex>$gender</Sex> 
                        <DateOfBirth></DateOfBirth>
                        <Contacts>
                          <Email>$email</Email>
                          <Phones></Phones>
                        </Contacts>
                        <Addresses>
                          <Billing>
                          <State></State>
                          <Country>$country</Country>
                          </Billing>
                        </Addresses>
	                  </Person>";

        $response = $this->bridge->processPerson($person_xml);
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
                $returnVal = false;

                break;
        }

        return $returnVal;
    }
}

