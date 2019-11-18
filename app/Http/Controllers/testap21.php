<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SYG\Bridges\BridgeInterface;
use App\Models\Ap21_error;

class testap21 extends Controller
{
    public function __construct(BridgeInterface $bridge)
	{
        $this->bridge = $bridge;
    }

    public function remove_loyalty(){
        $email='sygtest@gmail.com';
        $response = $this->bridge->getPersonid($email);
        if (!empty($response)) {
            $returnCode = $response->getStatusCode();
            $userid = false;
            switch ($returnCode) {
                case '200':
                    $response_xml = @simplexml_load_string($response->getBody()->getContents());
                    $userid = $response_xml->Person->Id;
                    $filtered ='';
                        if(isset($response_xml->Person->Loyalties->Loyalty)):
                            $response_xml->Person->Loyalties="";
                            $new_xml = $response_xml->Person->asXML();
                            echo $new_xml;
                            $this->update_user($new_xml,115414);
                            /*$filtered =  collect($response_xml->Person->Loyalties->Loyalty)->filter(function ($item, $key) {
                                        return isset($item->LoyaltyTypeId) && $item->LoyaltyTypeId==env('LOYALTY_ID');
                                });*/
                        endif;

                    /*if($filtered==''){
                        $response_xml->Person->Loyalties->Loyalty->LoyaltyTypeId = env('LOYALTY_ID');
                        $new_xml = $response_xml->Person->asXML();
                        $this->update_user($new_xml,$userid);
                    }*/
                    break;                
            }
        }       
    }
    public function update_user($person_xml, $userid) {
        $returnVal = false;
        $response = $this->bridge->updatePerson($person_xml,$userid);
        if (!empty($response)) {
            $returnCode = $response->getStatusCode();
            switch ($returnCode) {
                case 200:
                    $returnVal = true;
                    break;

                default:
                    $url = env('AP21_URL') . "Persons/".$userid."/?countryCode=" . env('AP21_COUNTRYCODE');
                    $error_response = $response->getBody()->getContents();
                    Ap21_error::store([
                        'api' => 'PUT Person-API/Register',
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


public function voucher_valid(){
    //$gift_id="200001005111"; $pin="3164111";$total=1000;
    $gift_id="1200001012"; $pin="2026";$total=100;
    //$gift_id="200001029"; $pin="3649";
    //$gift_id="200001036"; $pin="923";
    //$gift_id="200001043"; $pin="2685";
    //$gift_id="200001050"; $pin="8545";
    //$gift_id="200001067"; $pin="158";
    //$gift_id="200001074"; $pin="1267";
    //$gift_id="200001081"; $pin="9201";
    //$gift_id="200001098"; $pin="1352";
    //$gift_id="200001104"; $pin="7573";
    //$gift_id="200001111"; $pin="6344";
    //$gift_id="200001128"; $pin="7572";
    $response=$this->bridge->vouchervalid($gift_id,$pin,$total);    
    $returnCode = $response->getStatusCode();    
    switch ($returnCode) {
            case 200:        
                $response_body=$response->getBody()->getContents();
                print_r($response_body);
                echo "<hr>Success : Gift Voucher is Valid";
                break;
            case 403 :
                echo "Incorrect Voucher";
                break;
            default:
                echo "<hr>HTTP ERROR -> " . $returnCode . "<br>" . $response->getBody();
                break;
        }   
    exit;
}  
public function create_order($person_id='115414'){               
        $xml_data = "
        <Order>
        <PersonId>115414</PersonId>
        <OrderNumber>BRN-2018-test-5</OrderNumber>
        <DeliveryInstructions></DeliveryInstructions>
        <Addresses>
            <Billing>
              <ContactName>test test</ContactName>
              <AddressLine1>test</AddressLine1>
              <AddressLine2>dd</AddressLine2>
              <City>test</City>
              <State>NSW</State>
              <Postcode>2222</Postcode>
              <Country></Country>
            </Billing>
            <Delivery>
              <ContactName>test test</ContactName>
              <AddressLine1>test</AddressLine1>
              <AddressLine2>dd</AddressLine2>
              <City>test</City>
              <State>NSW</State>
              <Postcode>2222</Postcode>
              <Country></Country>
            </Delivery>
        </Addresses>
        <Contacts>
            <Email>abcsygtest@gmail.com</Email>
            <Phones>
                <Home>2222222222</Home>
            </Phones>
        </Contacts>
        <OrderDetails>
                <OrderDetail>
                  <SkuId>202289</SkuId>
                  <Quantity>1</Quantity>
                  <Price>129.95</Price> <Value>129.95</Value>
        </OrderDetail>
        </OrderDetails>
            <Payments>
                <PaymentDetail>
                    <Id>7781</Id>
                    <Origin>CreditCard</Origin>
                    <CardType>MASTERCARD / VISA</CardType>
                    <Stan>986516</Stan>
                    <AuthCode/>
                    <AccountType/>
                    <Settlement>20111129</Settlement>
                    <Reference>Ref1</Reference>
                    <Amount>129.95</Amount>
                    <Message>payment_statusCURRENTbank_</Message>
                </PaymentDetail>
            </Payments>
        </Order>         
        ";
    
        $response = $this->bridge->processOrder($person_id,$xml_data ,'');
        print_r($response);
        if (!empty($response)) {
            $returnCode =  $response->getStatusCode();
            switch ($returnCode) {
                case 201:
                    $location=$response->getHeader('Location')[0];
                    $str_arr = explode("/", $location);
                    $last_seg = $str_arr[count($str_arr) - 1];
                    $last_seg_arr = explode("?", $last_seg);
                    $order_idx = $last_seg_arr[0];
                    echo "Success : Order ID is ".$order_idx;
                    break;
            
                default:
                $URL = env('AP21_URL') . "/Persons/$person_id/Orders/?countryCode=" . env('AP21_COUNTRYCODE');
                // Send ap21 alert 
                $error_response = $response->getBody();
                Ap21_error::store([
                    'api' => 'Order-API',
                    'url' => $URL,
                    'http_error' => $returnCode,
                    'error_response' => $error_response,
                    'error_type' => 'API Error',
                    'body' =>  $xml_data
                ]);
                    break;
            }  
        }     
    }
    public function xcreate_user(){
        $person_xml="<Person>
                        <Firstname>Test f</Firstname>
                        <Surname>test l</Surname>
                        <Contacts>
                          <Email>zj@syginteractive.com</Email>
                          <Phones>
                            <Home>11111</Home>
                          </Phones>
                        </Contacts>
                        <Addresses>
                            <Billing>
                              <AddressLine1>a1</AddressLine1>
                              <AddressLine2>a2</AddressLine2>
                              <City>city</City>
                              <State>state</State>
                              <Postcode>11</Postcode>
                              <Country></Country>
                            </Billing>
                            <Delivery>
                              <AddressLine1>d1</AddressLine1>
                              <AddressLine2>d2</AddressLine2>
                              <City>c2</City>
                              <State>s2</State>
                              <Postcode>22</Postcode>
                              <Country></Country>
                            </Delivery>
                        </Addresses>
                      </Person>";

        $response = $this->bridge->processPerson($person_xml);                            
        $returnCode =  $response->getStatusCode();
            switch ($returnCode) {
                case 201:
                    $location=$response->getHeader('Location')[0];
                    $str_arr = explode("/", $location);
                    $last_seg = $str_arr[count($str_arr) - 1];
                    $last_seg_arr = explode("?", $last_seg);
                    $person_idx = $last_seg_arr[0];
                    echo "Success : PersonIDX is ".$person_idx;                    
                    break;
                default:
                    $result = 'HTTP ERROR -> ' . $returnCode . "<br>" . $response->getBody();                   
                    echo "<br> ERROR RESPONSE : <br> $result";
                    break;
        }        
    }

    public function test_ap21_personidx($email='dfmamea@gmail.com'){ 
        $response = $this->bridge->getPersonid($email);
        if (!empty($response)) {
            $returnCode = $response->getStatusCode();

            switch ($returnCode) {
                case '200':
                    $response_xml = @simplexml_load_string($response->getBody()->getContents());
                    $userid = $response_xml->Person->Id;
                    
                    $returnVal = $userid;
                    break;

                case '404':                    
                    //$userid = $this->create_user();
                    break;

                default:
                   $error_response = $response->getBody()->getContents();
                    Ap21_error::store([
                        'api' => 'GET Person-API',
                        'url' => '',
                        'http_error' => $returnCode,
                        'error_response' =>  $error_response,
                        'error_type' => 'API Error',
                    ]);

                    $userid = false;
                    break;
            }
        }
       //echo "<br>";
        //echo "test ap21";die;
    }

    public function create_user() {

        $fullname = 'David'. ' ' . 'Mamea';
        $fname = 'David';
        $lname = 'Mamea';
        $returnVal = false;
        $returnData = '';

        if (!empty($fname) && !empty($lname)) {

            $firstname = $fname;
            $lastname = $lname;
        } else {
            list($firstname, $lastname) = explode(' ', $fullname);
        }

        $person_xml = "<Person>
                        <Firstname>$firstname</Firstname>
                        <Surname>$lastname</Surname>
                        <Contacts>
                          <Email>" . "dfmamea@gmail.com" . "</Email>
                          <Phones>
                            <Home>" . "+64 21 668 346" . "</Home>
                          </Phones>
                        </Contacts>
                        <Addresses>
                            <Billing>
                              <AddressLine1>" . htmlspecialchars("71 Revelry Lane, RD9") . "</AddressLine1>
                              <AddressLine2>" . htmlspecialchars("") . "</AddressLine2>
                              <City>" . htmlspecialchars("Whangārei") . "</City>
                              <State>" . htmlspecialchars("New Zealand") . "</State>
                              <Postcode>" . "0179" . "</Postcode>
                              <Country></Country>
                            </Billing>
                            <Delivery>
                              <AddressLine1>" . htmlspecialchars("71 Revelry Lane, RD9") . "</AddressLine1>
                              <AddressLine2>" . htmlspecialchars("") . "</AddressLine2>
                              <City>" . htmlspecialchars("Whangārei") . "</City>
                              <State>" . htmlspecialchars("New Zealand") . "</State>
                              <Postcode>" . "0179" . "</Postcode>
                              <Country></Country>
                            </Delivery>
                        </Addresses>
                      </Person>";

        $response = $this->bridge->processPerson($person_xml);
        
        $URL = env('AP21_URL') . "Persons/?countryCode=" . env('AP21_COUNTRYCODE');
        // $logger = array(
        //     'order_id' => $this->order->id,
        //     'log_title' => 'Person',
        //     'log_type' => 'Response',
        //     'log_status' => 'Generate Person XML',
        //     'result' => 'Created Person xml and submitted to app21 url:- ' . $URL,
        //     'xml' => $person_xml
        // );
        // Order_log::createNew($logger);
        $returnCode = $response->getStatusCode();
        switch ($returnCode) {
            case 201:
                $location = $response->getHeader('Location')[0];
                $str_arr = explode("/", $location);
                $last_seg = $str_arr[count($str_arr) - 1];
                $last_seg_arr = explode("?", $last_seg);
                $person_idx = $last_seg_arr[0];

                // $logger = array(
                //     'order_id' => $this->order->id,
                //     'log_title' => 'Person',
                //     'log_type' => 'Response',
                //     'log_status' => '201 Person ID Created',
                //     'result' => $person_idx,
                //     'xml'=> $person_xml ? $person_xml : "",
                // );
                // Order_log::createNew($logger);
                $returnVal = $person_idx;


                break;

            default:
               
                $error_response = $response->getBody()->getContents();
                echo "http_error = $returnCode";
                //exit;

                
                Ap21_error::store([
                    'api' => 'POST Person-API/Payment',
                    'url' => $URL,
                    'http_error' => $returnCode,
                    'error_response' => $error_response,
                    'error_type' => 'API Error',
                    'body' =>  $person_xml
                ]);
                exit;

                $returnVal = false;

                break;
        }

        return $returnVal;
    }

}
