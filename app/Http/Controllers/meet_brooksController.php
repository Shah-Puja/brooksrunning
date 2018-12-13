<?php

namespace App\Http\Controllers;

use App\Rules\Recaptcha;
use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\Competition_user;
use App\SYG\Bridges\BridgeInterface;
use App\Models\User;
use App\SYG\Subscribers\SubscriberInterface;

class meet_brooksController extends Controller
{   
    protected $bridge;
    protected $client;
    public function __construct(BridgeInterface $bridge,SubscriberInterface $client) {
        $this->bridge = $bridge;
        $this->client = $client;
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
                                      ['first_name' => request('fname'),
                                       'last_name' => request('lname'),
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
            // Update Or Create competition user in Aweber               
            $subscriber = array(
            'email' => request('email'),
            'name' => request('fname')." ".request('lname'),
            'ad_tracking' => 'Competition',
            'misc_notes' => request('comp_name'),
            'custom_fields' => array(
                'Post Code' => request('postcode'),
                'Gender' => request('gender'),
                'Birth Day'=> request('custom_Birth_Date'),
                'Birth Month' => request('custom_Birth_Month'),
                'Age' => request('custom_Age'),
                'Country' => request('country'),
                'Shoes you wear' => request('custom_Shoes_you_wear'),
                'Contest Code' => request('comp_name'),
                ),                        
            );
            $this->client->updateoradd_Subscriber($subscriber);
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

    public function enewsletter_store(Recaptcha $recaptcha){
        request()->validate([
            'fname' => 'required',
            'lname' => 'required',
    		'gender' => 'required',    		
            'email' => 'required|email',
     		'country' => 'required',
            'postcode' => 'required',
            'g-recaptcha-response' => ['required', $recaptcha],
            ]);

        $Person = User::firstOrCreate(['email' => request('email')], 
                                      ['first_name' => request('fname'),
                                       'last_name' => request('lname'),
                                       'tag' => request('comp_name'),
                                       'gender' => request('gender'),
                                       'dob' => request('custom_Birth_Month').'-'.request('custom_Birth_Date'),
                                       'age_group' => request('custom_Age'),
                                       'postcode' => request('postcode'),
                                       'shoe_wear' => request('custom_Shoes_you_wear'),
                                       'contest_code' => request('postcode'),
                                       'source' => 'Subscriber',
                                       'subscribed' => 'Yes',
                                       'user_type' => 'Subscriber']);
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
        
        if($Person->wasRecentlyCreated){
            return response()->json([ 'success' => '<p class="heading">Thank you! </p> <p class="thankyou_heading">Welcome to the Brooks Running family. <br/>
            We look forward to sharing the latest news about our products, events and specials with you.<br> Stay tuned and Run Happy!</p>' ]);
        }else{
            User::where('email',request('email'))->update(['subscribed' => 'Yes', 'contest_code' => request('contest_code')]);
            return response()->json([ 'success' => '<p class="heading">Thanks for your interest! </p> <p class="thankyou_heading">You are already on our subscriber list.</p>' ]);
        }
    }
    
    public function update_previous_competitions(){
        ini_set('max_execution_time', 300);
        $competition_user = Competition_user::where('comp_aweber_exist','No')->limit(15)->get();
        foreach($competition_user as $curr_user){
            echo"<br>".$curr_user->id."-".$curr_user->email. " - ".$curr_user->comp_name;
            //print_r($curr_user);
            $subscriber = array(
                'email' => $curr_user->email,
                'name' => $curr_user->fname." ".$curr_user->lname,
                'ad_tracking' => 'Competition',
                'misc_notes' => $curr_user->comp_name,
                'custom_fields' => array(
                    'Post Code' => $curr_user->postcode,
                    'Gender' => $curr_user->gender,
                    'Age' => $curr_user->age_group,
                    'Country' => $curr_user->country,
                    'Shoes you wear' => $curr_user->shoes_wear,
                    'Contest Code' => $curr_user->comp_name,
                    ),                        
                );
                $this->client->updateoradd_Subscriber($subscriber);
                Competition_user::where('email',$curr_user->email)->update(['comp_aweber_exist' => 'Yes' ]);
            //exit;           
        }
    }
}