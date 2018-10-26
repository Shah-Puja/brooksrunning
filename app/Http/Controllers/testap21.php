<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SYG\Bridges\BridgeInterface;

class testap21 extends Controller
{
    public function __construct(BridgeInterface $bridge)
	{
        $this->bridge = $bridge;
    }
    public function create_user(){

        $person_xml="<Person>
                        <Firstname>Test f</Firstname>
                        <Surname>test l</Surname>
                        <Contacts>
                          <Email>zh@syginteractive.com</Email>
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
        print_r($response);
        echo "<hr>";
        print_r($response->getHeaders());   
        echo "<hr>";
        $location=$response->getHeader('Location')[0];
        $str_arr = explode("/", $location);
        $last_seg = $str_arr[count($str_arr) - 1];
        $last_seg_arr = explode("?", $last_seg);
        $person_id = $last_seg_arr[0];
        echo "------------------".$person_id;
        
        exit;
             
        $returnCode =  $response->getStatusCode();
            switch ($returnCode) {
                case 201:
                    $response_xml = @simplexml_load_string($response->getBody());
                    print_r($response_xml);
                    //$person_id = $response_xml->Person->Id;                                    
                    break;
                default:
                    $result = 'HTTP ERROR -> ' . $returnCode . "<br>" . $response->getBody();                   
                    echo "<br> ERROR RESPONSE : <br> $result";
                    break;
        }        
    }

}
