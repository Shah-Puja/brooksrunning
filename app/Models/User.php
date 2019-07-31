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

    public static function get_personid($bridge,$data,$process) {
        $response = $bridge->getPersonid($data['email']);
        //print_r($response);
        if (!empty($response)) {
            $returnCode = $response->getStatusCode();
            //exit;
            $userid = false;
            switch ($returnCode) {
                case '200':
                    $response_xml = @simplexml_load_string($response->getBody()->getContents());
                    $userid = $response_xml->Person->Id;
                    break;

                case '404':
                    $userid = (new static)->create_user($bridge,$data,$process);
                    break;

                default:
                    $userid = false;
                    break;
            }
        } else {
            $userid = (new static)->create_user($bridge,$data,$process);
        }

        return $userid;
    }

    public static function create_user($bridge,$data,$process) {
        $returnVal = false;
        if (isset($data['gender']) && strtolower($data['gender']) == "male") {
            $data['gender'] = "M";
        } elseif (isset($data['gender']) && strtolower($data['gender']) == "female") {
            $data['gender'] = "F";
        }
        $data['process'] = $process;    
        $person_xml = view('xml.person_xml')->with('data', $data);
        echo $person_xml;
        $response = $bridge->processPerson($person_xml);
        print_r($response);
        exit;
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
