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

        //echo "eeeeee";echo "<pre>";print_r($this->_order);die;   
        $fname = $this->_fname;
        $lname = $this->_lname;
        $returnVal = false;
        $returnData = '';

        if (!empty($fname) && !empty($lname)) {

            $firstname = $fname;
            $lastname = $lname;
        } else {
            list($firstname, $lastname) = explode(' ', $this->_fullname);
        }

        $person_xml = "<Person>
                        <Firstname>$firstname</Firstname>
                        <Surname>$lastname</Surname>
                        <Contacts>
                          <Email>" . $this->_email . "</Email>
                          <Phones>
                            <Home>" . $this->_phone . "</Home>
                          </Phones>
                        </Contacts>
                        <Addresses>
                            <Billing>
                              <AddressLine1>" . htmlspecialchars($this->_addressbill) . "</AddressLine1>
                              <AddressLine2>" . htmlspecialchars($this->_addressbill2) . "</AddressLine2>
                              <City>" . htmlspecialchars($this->_order->address->b_city) . "</City>
                              <State>" . htmlspecialchars($this->_order->address->b_state) . "</State>
                              <Postcode>" . $this->_order->address->b_postcode . "</Postcode>
                              <Country></Country>
                            </Billing>
                            <Delivery>
                              <AddressLine1>" . htmlspecialchars($this->_order->address->s_add1) . "</AddressLine1>
                              <AddressLine2>" . htmlspecialchars($this->_order->address->s_add2) . "</AddressLine2>
                              <City>" . htmlspecialchars($this->_order->address->s_city) . "</City>
                              <State>" . htmlspecialchars($this->_order->address->s_state) . "</State>
                              <Postcode>" . $this->_order->address->s_postcode . "</Postcode>
                              <Country></Country>
                            </Delivery>
                        </Addresses>
                      </Person>";

        $response = $this->bridge->processPerson($person_xml);
        $URL = env('AP21_URL') . "Persons/?countryCode=" . env('AP21_COUNTRYCODE');
        $logger = array(
            'order_id' => $this->_order_id,
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
                    'order_id' => $this->_order_id,
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
                    'order_id' => $this->_order_id,
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
                        ->send(new OrderAp21Alert($this->_order, $data));

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
                    'order_id' => $this->_order_id,
                    'log_title' => 'Person',
                    'log_type' => 'Response',
                    'log_status' => 'Person Id Found',
                    'result' => $userid,
                );
                Order_log::createNew($logger);
                break;

            case '404':
                $userid = $this->create_user();
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
        $this->_order = $order;
    }

    public function manual_ap21_push($order_id) {
        $order = Order::where('id', $order_id)->with('orderItems.variant.product', 'address')->first();
        $this->init($order_id, $order);
    }

    public function giftVoucherGvvalid() {
        $dataValue = false;
        if ($this->_order->gift_amount > 0) {
            $gift = $this->_order->giftcert_ap21code;
            $pin = $this->_order->giftcert_ap21pin;
            $amount = $this->_order->gift_amount;
            $url = env('AP21_URL') . "/Voucher/GVValid/{$gift}?pin={$pin}&amount={$amount}&countryCode=" . env('AP21_COUNTRYCODE');
            $response = $this->bridge->vouchervalid($gift, $pin, $amount);
            $returnCode = $response->getStatusCode();

            switch ($returnCode) {
                case 200:

                    $xml = @simplexml_load_string($response->getBody()->getContents());
                    $dataValue['VoucherNumber'] = (int) ($xml->VoucherNumber);
                    $dataValue['gift_pin'] = $pin;
                    $dataValue['ExpiryDate'] = $xml->ExpiryDate;
                    $dataValue['ValidationId'] = $xml->ValidationId;
                    $dataValue['Amount'] = $amount;
                    break;

                case 403 :
                    echo "Incorrect Voucher";
                    $dataValue = false;
                    break;

                default:
                    $result = "<hr>HTTP ERROR -> " . $returnCode . "<br>" . $response->getBody();
                    $data = array(
                        'api_name' => 'Gift certificate',
                        'URL' => $url,
                        'Result' => $result,
                        'Parameters' => '',
                    );
                    Mail::to(config('site.notify_email'))
                            ->cc(config('site.syg_notify_email'))
                            ->send(new OrderAp21Alert($this->_order, $data));
                    $dataValue = false;
                    break;
            }
        }
        return $dataValue;
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
        $PersonId = $order->person_idx;
        $this->init($order_id, $order);
        /* echo "<br> order id :" . $order_id;
          echo "<br> person id :" . $PersonId;
          die; */

        $returnVal = false;
        $returnData = array();
        $returnOrderNum = $order_id;
        $add_description = '';
        $ordernum = "BRN-" . $order->order_no; //change Order No with new series when site goes live

        if (!empty($order->coupon_code)) {
            $add_description .= ' Coupon Code :- ' . $order->coupon_code;
        }

        if (!empty($order->giftcert_ap21code)) {
            $add_description .= ' Gift Code :- ' . $order->giftcert_ap21code;
        }

        if (!empty($order->nab_trans_id)) {
            $add_description .= ' Transaction Id :- ' . $order->nab_trans_id;
        }

        $fullname = $order->address->b_fname . ' ' . $order->address->b_lname;
        $fname = $order->address->s_fname;
        $lname = $order->address->s_lname;
        $returnVal = false;
        $returnData = '';

        if (!empty($fname) && !empty($lname)) {

            $firstname = $fname;
            $lastname = $lname;
        } else {
            list($firstname, $lastname) = explode(' ', $fullname);
        }

        $xml_data = "
                <Order>
                <PersonId>$PersonId</PersonId>
                <OrderNumber>" . $ordernum . "</OrderNumber>";
        $xml_data .= "<DeliveryInstructions>" . $add_description . "</DeliveryInstructions>";
        $xml_data .= "<Addresses>
                    <Billing>
                      <ContactName>" . htmlspecialchars(((isset($fullname) && $fullname != "") ? $fullname : "")) . "</ContactName>
                      <AddressLine1>" . htmlspecialchars(((isset($order->address->b_add1) && $order->address->b_add1 != "") ? $order->address->b_add1 : $order->address->s_add1)) . "</AddressLine1>
                      <AddressLine2>" . htmlspecialchars(((isset($order->address->b_add2) && $order->address->b_add2 != "") ? $order->address->b_add2 : $order->address->s_add2)) . "</AddressLine2>
                      <City>" . htmlspecialchars(((isset($order->address->b_city) && $order->address->b_city != "") ? $order->address->b_city : $order->address->s_city)) . "</City>
                      <State>" . htmlspecialchars(((isset($order->address->b_state) && $order->address->b_state != "") ? $order->address->b_state : $order->address->s_state)) . "</State>
                      <Postcode>" . htmlspecialchars(((isset($order->address->b_postcode) && $order->address->b_postcode != "") ? $order->address->b_postcode : $order->address->s_postcode)) . "</Postcode>
                      <Country></Country>
                    </Billing>
                    <Delivery>
                      <ContactName>" . htmlspecialchars($order->address->s_fname) . " " . $order->address->s_lname . "</ContactName>
                      <AddressLine1>" . htmlspecialchars($order->address->s_add1) . "</AddressLine1>
                      <AddressLine2>" . htmlspecialchars($order->address->s_add2) . "</AddressLine2>
                      <City>" . htmlspecialchars($order->address->s_city) . "</City>
                      <State>" . htmlspecialchars($order->address->s_state) . "</State>
                      <Postcode>" . htmlspecialchars($order->address->s_postcode) . "</Postcode>
                      <Country></Country>
                    </Delivery>
                </Addresses>
                <Contacts>
                    <Email>" . $order->address->email . "</Email>
                    <Phones>
                        <Home>" . $order->address->s_phone . "</Home>
                    </Phones>
                </Contacts>
                <OrderDetails>";


        $i = 0;

        $subtotal = 0;
        //echo "<pre>";print_r($order->orderItems);die;
        foreach ($order->orderItems as $item) {

            $sku = $item->variant->id;
            $qty = $item->qty;
            $price = $item->price_sale;
            //$value = $qty * $price;
            $value = $item->total;
            $discount = ($item->discount != 0) ? $item->discount : 0;
            $promo_code = $item->promo_code;
            $promo_string = $item->promo_string;


            $xml_data .= "
                        <OrderDetail>
                          <SkuId>$sku</SkuId>
                          <Quantity>$qty</Quantity>
                          <Price>$price</Price>";


            if (!empty($discount)) {
                $xml_data .= "<Discounts>
              <Discount>
              <DiscountType>ManualDiscount</DiscountType>
              <DiscountTypeId>1</DiscountTypeId>
              <ReasonId>720</ReasonId>>";

                if ($promo_code == 'BROOKS30' && $promo_string != ''):
                    $xml_data .= "<Description>$promo_string</Description>";
                else:
                    $xml_data .= "<Description>$promo_code</Description>";
                endif;
                $xml_data .= "<Value>$discount</Value>
              </Discount>
              </Discounts>";
            }

            $xml_data .= " <Value>$value</Value>
                        </OrderDetail>";
            $i++;

            $subtotal += $value;
        }

        if (!empty($order->freight_cost) && $order->freight_cost != 0) {
            $xml_data .= "<OrderDetail>
                                  <SkuId>2542</SkuId>
                                  <Quantity>1</Quantity>
                                  <Price>" . $order->freight_cost . "</Price> 
                                  <Value>" . $order->freight_cost . "</Value>
                                </OrderDetail>";
            $subtotal += $order->freight_cost;
        }

        $xml_data .= "
                </OrderDetails>";
        $xml_data .= "<Payments>";

        $gift_data = $this->giftVoucherGvvalid();
        //print_r($gift_data);
        if ($gift_data) {

            $gift_amount = $order->gift_amount;
            $subtotal = $subtotal - $gift_amount;

            $xml_data .= " <PaymentDetail>
          <Origin>GiftVoucher</Origin>
          <VoucherNumber>" . $gift_data['VoucherNumber'] . "</VoucherNumber>
          <ValidationId>" . $gift_data['ValidationId'] . "</ValidationId>
          <Amount>" . $gift_amount . "</Amount>
          </PaymentDetail>";

            $subtotal = number_format($subtotal, 2);
        }
        if ($order->payment_type == "AfterPay") {
            $merchant_id = env('AFTERPAY_MERCHANT_ID');
            $xml_data .= "<PaymentDetail>
						<Origin>CreditCard</Origin>
						<MerchantId>" . $merchant_id . "</MerchantId>
						<CardType>AFTERPAY</CardType>
						<Stan>" . $order->id . "</Stan>
						<Reference>" . $order->id . "</Reference>
						<Amount>" . $subtotal . "</Amount>
						</PaymentDetail>\n\t\t";
        } else {
            $xml_data .= "<PaymentDetail>
                            <Id>7781</Id>
                            <Origin>CreditCard</Origin>
                            <CardType>MASTERCARD / VISA</CardType>
                            <Stan>986516</Stan>
                            <AuthCode/>
                            <AccountType/>
                            <Settlement>20111129</Settlement>";

            if (!empty($order->nab_trans_id)) {
                $xml_data .= "<Reference>" . $order->nab_trans_id . "</Reference>";
            } else {
                $xml_data .= "<Reference>Ref1</Reference>";
            }

            $xml_data .= "<Amount>" . $subtotal . "</Amount>";
            $xml_data .= "<Message>payment_statusCURRENTbank_</Message>";
            $xml_data .= "</PaymentDetail>";
        }
        $xml_data .= "</Payments>";

        $xml_data .= "</Order>";

        /* echo $xml_data;
          die; */


        $orderDataUpdate = array(
            'ap21_xml' => $xml_data
        );
        Order::where('id', $order_id)->update($orderDataUpdate);
        echo "<br>Ap21 Xml Updated in orders";
    }

    //Step 3: Send ap21_xml to Ap21.
    public function send_manual_ap21($order_id) {
        $order = Order::where('id', $order_id)->with('orderItems.variant.product', 'address')->first();
        $PersonId = $order->person_idx;
        echo "<pre>";
        print_r($order->ap21_xml);
        die;
        //$this->init($order_id, $order);
    }

}
