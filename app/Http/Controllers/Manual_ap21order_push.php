<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SYG\Bridges\BridgeInterface;
use App\Models\Order;
use App\Models\Order_log;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderAp21Alert;

class Manual_ap21order_push extends Controller {

    protected $bridge;

    public function __construct(BridgeInterface $bridge) {
        $this->bridge = $bridge;
    }

    public function create_user() {

        $fullname = $this->order->address->b_fname . ' ' . $this->order->address->b_lname;
        $fname = $this->order->address->s_fname;
        $lname = $this->order->address->s_lname;
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
                          <Email>" . $this->order->address->email . "</Email>
                          <Phones>
                            <Home>" . $this->order->address->s_phone . "</Home>
                          </Phones>
                        </Contacts>
                        <Addresses>
                            <Billing>
                              <AddressLine1>" . htmlspecialchars($this->order->address->b_add1) . "</AddressLine1>
                              <AddressLine2>" . htmlspecialchars($this->order->address->b_add2) . "</AddressLine2>
                              <City>" . htmlspecialchars($this->order->address->b_city) . "</City>
                              <State>" . htmlspecialchars($this->order->address->b_state) . "</State>
                              <Postcode>" . $this->order->address->b_postcode . "</Postcode>
                              <Country></Country>
                            </Billing>
                            <Delivery>
                              <AddressLine1>" . htmlspecialchars($this->order->address->s_add1) . "</AddressLine1>
                              <AddressLine2>" . htmlspecialchars($this->order->address->s_add2) . "</AddressLine2>
                              <City>" . htmlspecialchars($this->order->address->s_city) . "</City>
                              <State>" . htmlspecialchars($this->order->address->s_state) . "</State>
                              <Postcode>" . $this->order->address->s_postcode . "</Postcode>
                              <Country></Country>
                            </Delivery>
                        </Addresses>
                      </Person>";

        $response = $this->bridge->processPerson($person_xml);
        $URL = env('AP21_URL') . "Persons/?countryCode=" . env('AP21_COUNTRYCODE');
        $logger = array(
            'order_id' => $order_id,
            'log_title' => 'Person',
            'log_type' => 'Response',
            'log_status' => 'Generate Person XML',
            'result' => 'Created Person xml and submitted to app21 url:- ' . $URL,
            'xml' => $person_xml
        );
        Order_log::createNew($logger);
        $returnCode = $response->getStatusCode();
        switch ($returnCode) {
            case 201:
                $location = $response->getHeader('Location')[0];
                $str_arr = explode("/", $location);
                $last_seg = $str_arr[count($str_arr) - 1];
                $last_seg_arr = explode("?", $last_seg);
                $person_idx = $last_seg_arr[0];

                $logger = array(
                    'order_id' => $order_id,
                    'log_title' => 'Person',
                    'log_type' => 'Response',
                    'log_status' => '201 Person ID Created',
                    'result' => $person_idx,
                );
                Order_log::createNew($logger);
                $returnVal = $person_idx;


                break;

            default:
                $result = 'HTTP ERROR -> ' . $returnCode . "<br>" . $response->getBody();
                $logger = array(
                    'order_id' => $order_id,
                    'log_title' => 'Person',
                    'log_type' => 'Response',
                    'log_status' => 'Error While Creating Person ID',
                    'result' => $result,
                );
                Order_log::createNew($logger);

                // Send ap21 alert  
                $result = 'HTTP ERROR -> ' . $returnCode . "<br>" . $response->getBody()->getContents();
                $data = array(
                    'api_name' => 'Create Person Error',
                    'URL' => $URL,
                    'Result' => $result,
                    'Parameters' => $person_xml,
                );
                Mail::to(config('site.notify_email'))
                        ->cc(config('site.syg_notify_email'))
                        ->send(new OrderAp21Alert($this->order, $data));

                $returnVal = false;

                break;
        }

        return $returnVal;
    }

    public function get_personid() {
        $response = $this->bridge->getPersonid($this->_email);
        //print_r($response);
        //exit;      
        $returnCode = $response->getStatusCode();
        $userid = false;
        switch ($returnCode) {
            case '200':

                $response_xml = @simplexml_load_string($response->getBody()->getContents());
                $userid = $response_xml->Person->Id;
                $logger = array(
                    'order_id' => $order_id,
                    'log_title' => 'Person',
                    'log_type' => 'Response',
                    'log_status' => 'Person Id Found',
                    'result' => $userid,
                );
                Order_log::createNew($logger);
                break;

            case '404':
                $userid = $this->create_user($email, $fname, $lname, $phone, $country);
                break;

            default:
                $result = 'HTTP ERROR -> ' . $returnCode . "<br>" . $response->getBody()->getContents();
                $logger = array(
                    'order_id' => $this->_order_id,
                    'log_title' => 'Person',
                    'log_type' => 'Response',
                    'log_status' => 'Error While Getting Person ID',
                    'result' => $result,
                );

                Order_log::createNew($logger);

                $URL = env('AP21_URL') . "/Persons/?countryCode=" . env('AP21_COUNTRYCODE') . "&email=" . $this->_email;
                $data = array(
                    'api_name' => 'Get PersonID Error',
                    'URL' => $URL,
                    'Result' => $result,
                    'Parameters' => '',
                );
                Mail::to(config('site.notify_email'))
                        ->cc(config('site.syg_notify_email'))
                        ->send(new OrderAp21Alert($this->order, $data));
                $userid = false;
                break;
        }
        $orderDataUpdate = array(
            'person_idx' => $userid,
            'personid_status' => date('Y-m-d H:i:s')
        );
        Order::where('id', $this->_order_id)->update($orderDataUpdate);
        //return $userid;
    }

    public function init($order_id, $order) {
        $this->_fullname = $order->address->s_fname . " " . $order->address->l_fname;
        $this->_fname = $order->address->s_fname;
        $this->_lname = $order->address->l_fname;
        $this->_email = $order->address->email;
        $this->_phone = $order->address->s_phone;
        $this->_addressbill = (isset($order->address->b_add1) && $order->address->b_add1 != "") ? $order->address->b_add1 : $order->address->s_add1;
        $this->_addressbill2 = (isset($order->address->b_add2) && $order->address->b_add2 != "") ? $order->address->b_add2 : $order->address->s_add2;
        $this->_addressship = $order->address->s_add1;
        $this->_order_id = $order_id;
    }

    public function manual_ap21_push($order_id) {
        $order = Order::where('id', $order_id)->with('orderItems.variant.product', 'address')->first();
        $this->init($order_id, $order);
    }

    // Step 1 :Get person id from AP21 else generate
    public function pushap21_person($order_id) {
        $order = Order::where('id', $order_id)->with('orderItems.variant.product', 'address')->first();
        $PersonID = $order->person_idx;
        if (env('AP21_STATUS') == 'ON') {
            if (empty($PersonID)) {
                $this->init($order_id, $order);
                $PersonID = $this->get_personid();
            }
        }
    }

    // Step 2: Generate Ap21_xml if not available in order_mast,else skip this step.
    public function app21Order($order_id) {
        $order = Order::where('id', $order_id)->with('orderItems.variant.product', 'address')->first();
        $PersonID = $order->person_idx;
        $this->init($order_id, $order);
        echo "<br> order id :" . $order_id;
        echo "<br> person id :" . $PersonId;
        die;
    }

}
