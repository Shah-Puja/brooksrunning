<?php

namespace App\Payments;
use App\Payments\AfterpayApiClient;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class AfterpayProcessor {

    protected $afterpayApiClient;

    public function __construct($afterpayApiClient) {
        $this->afterpayApiClient = $afterpayApiClient;
    }

    public function getAfterpayToken($order) {
        /*$data = [
            "totalAmount" => [
                "amount" => "20.00",
                "currency" => "AUD"
            ],
            "consumer" => [
                "phoneNumber" => "0413111222",
                "givenNames" => "Puja",
                "surname" => "Shah",
                "email" => "puja.shah@orionsolution.com"
            ],
            "merchant" => [
                "redirectConfirmUrl" => "afterpay_payment",
                "redirectCancelUrl" => "afterpay_payment"
            ],
            "merchantReference" => '123'
        ];*/
        $data = $this->prepareOrderData($order);
		return $this->afterpayApiClient->createOrder($data); 
        //return $this->afterpayApiClient->generateToken($data);
    }

    public function getOrder($token) {
        return $this->afterpayApiClient->getOrder($token);
    }

    public function charge($order) { 
        $paymentDetails = [
			"token" => $order['afterpayToken'],
			"merchantReference" => $order['id']
        ];
        
		return $this->afterpayApiClient->capturePayment($paymentDetails);
    }

    protected function prepareOrderData($order)
	{
		return [  
          "totalAmount" => [
            "amount" => $order->grand_total,
            "currency" => "AUD"
          ],
          "consumer" => [ 
            "phoneNumber" => $order->address->b_phone,
            "givenNames" => $order->address->b_fname,
            "surname" => $order->address->b_lname,
            "email" => $order->address->email
          ],
          "merchant" => [
            "redirectConfirmUrl" => "http://brooksrunning.test/afterpay_success.php",
            "redirectCancelUrl" => "http://brooksrunning.test/afterpay_cancel.php"
          ],
          "merchantReference" => $order->id,
        ];	
	}

}
