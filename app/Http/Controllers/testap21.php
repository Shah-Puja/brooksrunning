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
public function voucher_valid(){
    //$gift_id="200001005111"; $pin="3164111";$total=1000;
    $gift_id="200001012"; $pin="2026";$total=100;
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
    
    try{
        $response = $this->bridge->vouchervalid($gift_id,$pin,$total);   
        print_r($response);
        //exit;
    }
    catch (Exception $e) {
        echo "ERROR HANDLED";
        //exit;
    }
    $returnCode = $response->getStatusCode();
    //exit;
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
    
        $response = $this->bridge->processOrder($person_id,$xml_data);
        print_r($response);
    
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
            case 400 :
                echo "Order Exist";
                break;
            default:
                echo "HTTP ERROR -> " . $returnCode . "<br>" . $response->getBody();
                break;
        }       
    }
    public function create_user(){
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

}
