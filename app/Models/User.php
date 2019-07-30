<?php

namespace App\Models;

use App\Events\SubscriptionReceived;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{   
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'person_idx','first_name','last_name', 'email', 'password', 'gender', 'birth_date', 'birth_month', 'shoe_wear',
        'age_group', 'state', 'postcode', 'newsletter', 'source', 'user_type','contest_code','country'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $dispatchesEvents = [
        'created' => SubscriptionReceived::class,
    ];

    public function orders(){
        return $this->hasMany('App\Models\Order','user_id','id');
    }

    public static function get_personid($bridge,$email, $fname = '', $lname = '', $gender = '', $country = '') {
         print_r($bridge);
        $response = $bridge->getPersonid($email);
        if (!empty($response)) {
            $returnCode = $response->getStatusCode();
            $userid = false;
            switch ($returnCode) {
                case '200':
                    $response_xml = @simplexml_load_string($response->getBody()->getContents());
                    $userid = $response_xml->Person->Id;
                    break;

                case '404':
                    $userid = self::create_user($email, $fname, $lname, $gender, $country);
                    break;

                default:
                    $userid = false;
                    break;
            }
        } else {
            $userid = self::create_user($bridge,$email, $fname, $lname, $gender, $country);
        }

        return $userid;
    }

    public static function create_user($bridge,$email, $fname = '', $lname = '', $gender = '', $country = '') {
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

        $response = $bridge->processPerson($person_xml);
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
}
