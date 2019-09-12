<?php

namespace App\Http\Controllers;

use App\Rules\Recaptcha;
use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\Competition_user;
use App\SYG\Bridges\BridgeInterface;
use App\Models\User;
use Illuminate\Validation\Rule;

class meet_brooksController extends Controller {

    protected $bridge;

    public function __construct(BridgeInterface $bridge) {
        $this->bridge = $bridge;
    }

    public function index($meet_brooks_pg) {
        if ($meet_brooks_pg == 'run-happy-is') {
            return redirect('/meet_brooks/our_purpose');
        }
        if (!view()->exists('meet_brooks.' . $meet_brooks_pg)) {
            return abort(404);
        }
        return view('meet_brooks.' . $meet_brooks_pg);
    }

    public function competition($slug) {

        $competition = Competition::where('slug', $slug)->first();
        if (!$competition) {
            return abort(404);
        }
        if (!view()->exists('meet_brooks.competition.' . $competition->comp_form)) {
            return abort(404);
        }
        return view('meet_brooks.competition.competition', compact('competition'));
    }

    public function store(Recaptcha $recaptcha, Request $request) {
        request()->validate([
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'country' => 'required',
            'postcode' => 'required|numeric',
            'g-recaptcha-response' => ['required', $recaptcha],
        ]);

        $competition = Competition_user::firstOrCreate(
                        [
                    'email' => request('email'), 'comp_name' => request('comp_name')], [
                    'comp_slug' => request('comp_slug'),
                    'fname' => request('fname'),
                    'lname' => request('lname'),
                    'gender' => request('gender'),
                    'dob' => request('custom_Birth_Month') . '-' . request('custom_Birth_Date'),
                    'age_group' => request('custom_Age'),
                    'postcode' => request('postcode'),
                    'shoe_wear' => request('custom_Shoes_you_wear'),
                    'country' => request('country'),
                    'answer' => request('answer'),
                    'training_for' => (isset($request['training_for'])) ? request('training_for') : null,
                    'likes_to_run' => (isset($request['likes_to_run'])) ? implode(',', $request['likes_to_run']) : null,
                    'experience_preference' => (isset($request['experience_preference'])) ? implode(',', $request['experience_preference']) : null,
                        ]
        );

        //ap21 order process 
        $Person = User::firstOrCreate(['email' => request('email')], ['first_name' => request('fname'),
                    'last_name' => request('lname'),
                    'tag' => request('comp_name'),
                    'gender' => request('gender'),
                    'dob' => request('custom_Birth_Month') . '-' . request('custom_Birth_Date'),
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
                $PersonID = $this->get_personid(request('email'), request('fname'), request('lname'), request('gender'), request('country'));
            }
            if (!empty($PersonID)) {
                User::where('email', request('email'))->update(['person_idx' => $PersonID]);
            }
        }

        if ($competition->wasRecentlyCreated) {            
            return response()->json(['success' => '<p class="heading">Thank you! </p> <p class="thankyou_heading">Thanks for entering. Good Luck! </p>']);
        } else {
            return response()->json(['success' => '<p class="heading">Thank for your interest! </p> <p class="thankyou_heading">You have already entered the competition.</p>']);
        }
    }

    public function roadtester() {
        return view('meet_brooks.roadtester');
    }

    public function get_personid($email, $fname = '', $lname = '', $gender = '', $country = '') {

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
                    $userid = $this->create_user($email, $fname, $lname, $gender, $country);
                    break;

                default:
                    $userid = false;
                    break;
            }
        } else {
            $userid = $this->create_user($email, $fname, $lname, $gender, $country);
        }

        return $userid;
    }

    public function create_user($email, $fname = '', $lname = '', $gender = '', $country = '') {
        $returnVal = false;
        if (isset($gender) && $gender == "male") {
            $gender = "M";
        } elseif (isset($gender) && $gender == "female") {
            $gender = "F";
        }
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
                    $returnVal = false;
                    break;
            }
        }
        return $returnVal;
    }

    public function enewsletter_store(Recaptcha $recaptcha) {
        request()->validate([
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'country' => 'required',
            'postcode' => 'required|numeric',
            'g-recaptcha-response' => ['required', $recaptcha],
        ]);

        $contest_code = request('contest_code');
        $shoe_wear = request('custom_Shoes_you_wear');
        $state = request('country');

        $Person = User::firstOrCreate(['email' => request('email')], ['first_name' => request('fname'),
                    'last_name' => request('lname'),
                    'tag' => request('comp_name'),
                    'gender' => request('gender'),
                    'dob' => request('custom_Birth_Month') . '-' . request('custom_Birth_Date'),
                    'birth_date' => request('custom_Birth_Date'),
                    'birth_month' => request('custom_Birth_Month'),
                    'age_group' => request('custom_Age'),
                    'postcode' => request('postcode'),
                    'shoe_wear' => $shoe_wear,
                    'state' => $state,
                    'contest_code' => $contest_code,
                    'source' => 'Subscriber',
                    'subscribed' => 'Yes',
                    'user_type' => 'Subscriber']);
        if (isset($Person)) {
            $PersonID = ($Person->person_idx != '') ? $Person->person_idx : '';
        }
        if (env('AP21_STATUS') == 'ON') {
            if (empty($PersonID)) {
                $PersonID = $this->get_personid(request('email'), request('fname'), request('lname'), request('gender'), request('country'));
            }
            if (!empty($PersonID)) {
                User::where('email', request('email'))->update(['person_idx' => $PersonID]);
            }
        }

        if ($Person->wasRecentlyCreated) {
            return response()->json(['success' => '<p class="heading">Thank you! </p> <p class="thankyou_heading">Welcome to the Brooks Running family. <br/>
            We look forward to sharing the latest news about our products, events and specials with you.<br> Stay tuned and Run Happy!</p>']);
        } else {
            User::where('email', request('email'))->update(['subscribed' => 'Yes', 'contest_code' => request('contest_code')]);
            if (request('contest_code') != '') {
                return response()->json(['success' => '<p class="heading">Thanks for your interest! </p> <p class="thankyou_heading">Thank you for signing up.</p>']);
            } else {
                return response()->json(['success' => '<p class="heading">Thanks for your interest! </p> <p class="thankyou_heading">You are already on our subscriber list.</p>']);
            }
        }
    }

    public function rh_comp_thank_you() {
        return view('meet_brooks.competition.thank_you');
    }

    public function our_purpose() {
        return view('meet_brooks.our_purpose');
    }

    public function our_history() {
        return view('meet_brooks.our_history');
    }

    public function newsletter_signup() {
        $fname = $lname = "";
        if (strpos(request('name'), ' ') !== false) {
            $name = explode(' ', request('name'));
            $fname = $name[0];
            $lname = $name[1];
        } else {
            $fname = request('name');
        }

        $Person = User::firstOrCreate(['email' => request('email')], ['first_name' => $fname, 'last_name' => $lname, 'source' => 'Subscriber',
                    'subscribed' => 'Yes',
                    'user_type' => 'Subscriber']);
        if (isset($Person)) {
            $PersonID = ($Person->person_idx != '') ? $Person->person_idx : '';
        }
        if ($Person->wasRecentlyCreated) {
            $signup = 1;
        } else {
            $signup = 0;
        }
        if (env('AP21_STATUS') == 'ON') {
            if (empty($PersonID)) {
                //$PersonID = $this->get_personid(request('email'), request('fname'), request('lname'), request('gender'), request('country'));
                $PersonID = $this->get_personid(request('email'));
            }
            if (!empty($PersonID)) {
                User::where('email', request('email'))->update(['person_idx' => $PersonID]);
            }
        }
        return view('meet_brooks.thank-you-signup', compact('signup'));
    }

    public function newsletter_update(Recaptcha $recaptcha) {
        request()->validate([
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required',
            'email' => 'required|email',
            'country' => 'required',
            'postcode' => 'required|numeric',
            'g-recaptcha-response' => ['required', $recaptcha],
        ]);

        $contest_code = request('contest_code');
        $shoe_wear = request('custom_Shoes_you_wear');
        $state = request('country');

        $Person = User::updateOrCreate(['email' => request('email')], ['first_name' => request('fname'), 'last_name' => request('lname'), 'tag' => request('comp_name'), 'gender' => request('gender'), 'dob' => request('custom_Birth_Month') . '-' . request('custom_Birth_Date'), 'birth_date' => request('custom_Birth_Date'), 'birth_month' => request('custom_Birth_Month'), 'age_group' => request('custom_Age'), 'postcode' => request('postcode'), 'shoe_wear' => $shoe_wear, 'state' => $state, 'contest_code' => $contest_code, 'subscribed' => 'Yes']);
        if (isset($Person)) {
            $PersonID = ($Person->person_idx != '') ? $Person->person_idx : '';
        }
        if (request('signup') == 1) {
            return response()->json(['success' => '<p class="heading">Thank you! </p> <p class="thankyou_heading">Welcome to the Brooks Running family. <br/>
            We look forward to sharing the latest news about our products, events and specials with you.<br> Stay tuned and Run Happy!</p>']);
        } else {
            if (request('contest_code') != '') {
                return response()->json(['success' => '<p class="heading">Thanks for your interest! </p> <p class="thankyou_heading">Thank you for signing up.</p>']);
            } else {
                return response()->json(['success' => '<p class="heading">Thanks for your interest! </p> <p class="thankyou_heading">You are already on our subscriber list.</p>']);
            }
        }
    }

}
