<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;

class MedibankController extends Controller
{
    public function medibank_check_user(){
        if(Session::get('medibank_gateway')!='No'){
           
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => env('MEDIBANK_TOKEN_URL'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "client_id=".env('MEDIBANK_CLIENT_ID')."&client_secret=".env('MEDIBANK_CLIENT_SECRET')."&scope=".env('MEDIBANK_SCOPE')."&grant_type=".env('MEDIBANK_GRANT_TYPE')."",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/x-www-form-urlencoded",
                    "X-CSRF-TOKEN:". csrf_token(),
                    "cache-control: no-cache"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if(!$err) {
                $response = json_decode($response,true);
                if(isset($response['access_token'])){
                    
                    $access_token = $response['access_token'];

                    $curl = curl_init();
                    $PolicyNumber = Input::get('medibank_id');
                    $email = Input::get('email');
                    $corporate_id = env('MEDIBANK_CORPORATEID');
                    $RequestID = (new static)->generateUUID();

                    curl_setopt_array($curl, array(
                      CURLOPT_URL => env('MEDIBANK_VERIFY_MEMBER_URL'),
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => "",
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 30,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => "POST",
                      CURLOPT_POSTFIELDS => "{\r\n        \"PolicyNumber\": \"$PolicyNumber\",\r\n        \"GivenName\": \"\",\r\n        \"FamilyName\": \"\",\r\n        \"EmailURI\": \"$email\",\r\n        \"BirthDate\": \"\",\r\n        \"CorporateID\": \"$corporate_id\"\r\n}",
                      CURLOPT_HTTPHEADER => array(
                        "Accept: application/json",
                        "Authorization: $access_token",
                        "Content-Type: application/json",
                        "X-CSRF-TOKEN:". csrf_token(),
                        "RequestID:".$RequestID,
                        "cache-control: no-cache"
                      ),
                    ));
                    
                    $response1 = curl_exec($curl);
                    $err = curl_error($curl);
                    
                    curl_close($curl);
                    
                    if (!$err) {
                        if(!empty($response1)){
                            $response1 = json_decode($response1,true);
                            if(isset($response1['errorCode']) || isset($response1['message'])){
                                Session::flash('medibank_user_failed','Yes');
                            }else{
                                $verified = $response1['Verified'];
                                if($verified){
                                    Session::put('medibank_user','Yes');
                                    Session::put('medibank_user_email',$email);
                                    Session::put('medibank_user_memberid',$PolicyNumber);
                                }else{
                                    Session::flash('medibank_user_failed','Yes');
                                }
                            }
                        }else{
                            Session::flash('medibank_user_failed','Yes');
                        }
                        return back();
                    } 
                }else{
                    Session::flash('medibank_user_failed','Yes');
                    return back();
                }
            } else {
                //echo "cURL Error #:" . $err;
            }
        }else{
            return 'false';
        }
       
    }

    public static function generateUUID() {
            return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            // 32 bits for "time_low"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

            // 16 bits for "time_mid"
            mt_rand( 0, 0xffff ),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand( 0, 0x0fff ) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand( 0, 0x3fff ) | 0x8000,

            // 48 bits for "node"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
    }
}
