<?php

namespace App\Models;

use App\Events\SubscriptionReceived;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Ap21_log;

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
                    $logger = array(
                        'process' => $process,
                        //'order_id' => (isset($this->order->id)) ? $this->order->id: '',
                        'log_title' => 'Person',
                        'log_type' => 'Response',
                        'log_status' => 'Person Id Found',
                        'result' => $userid,
                    );
                    Ap21_log::createNew($logger);
                    break;

                case '404':
                    $userid = (new static)->create_user($bridge,$data,$process);
                    break;

                default:
                    $result = 'HTTP ERROR -> ' . $returnCode . "<br>" . $response->getBody()->getContents();
                    $logger = array(
                        'process' => $process,
                        //'order_id' => (isset($this->order->id)) ? $this->order->id: '',
                        'log_title' => 'Person',
                        'log_type' => 'Response',
                        'log_status' => 'Error While Getting Person ID',
                        'result' => $result,
                    );

                    Ap21_log::createNew($logger);

                    /*$URL = env('AP21_URL') . "/Persons/?countryCode=" . env('AP21_COUNTRYCODE') . "&email=" . $email;
                    $data = array(
                        'api_name' => 'Get PersonID Error',
                        'URL' => $URL,
                        'Result' => $result,
                        'Parameters' => '',
                    );
                    Mail::to(config('site.notify_email'))
                        ->cc(config('site.syg_notify_email'))
                        ->send(new OrderAp21Alert($this->order, $data));*/
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
        $response = $bridge->processPerson($person_xml);
        //print_r($response);
        //exit;
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

                    $logger = array(
                        'process' => $process,
                        //'order_id' => (isset($this->order->id)) ? $this->order->id: '',
                        'log_title' => 'Person',
                        'log_type' => 'Response',
                        'log_status' => '201 Person ID Created',
                        'result' => $person_idx,
                        'xml' => $person_xml ? $person_xml : "",
                    );
                    Ap21_log::createNew($logger);
                    break;

                default:
                    $result = 'HTTP ERROR -> ' . $returnCode . "<br>" . $response->getBody();
                    $logger = array(
                        'process' => $process,
                        //'order_id' => (isset($this->order->id)) ? $this->order->id: '',
                        'log_title' => 'Person',
                        'log_type' => 'Response',
                        'log_status' => 'Error While Creating Person ID',
                        'result' => $result,
                    );
                    Ap21_log::createNew($logger);

                    // Send ap21 alert  
                    /*$result = 'HTTP ERROR -> ' . $returnCode . "<br>" . $response->getBody()->getContents();
                    $data = array(
                        'api_name' => 'Create Person Error',
                        'URL' => $URL,
                        'Result' => $result,
                        'Parameters' => $person_xml,
                    );
                    Mail::to(config('site.notify_email'))
                            ->cc(config('site.syg_notify_email'))
                            ->send(new OrderAp21Alert($this->order, $data));*/
                    $returnVal = false;
                    break;
            }
        }
        return $returnVal;
    }
}
