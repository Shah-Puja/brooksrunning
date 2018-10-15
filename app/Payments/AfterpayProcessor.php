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
        $data = $this->prepareOrderData($order);
		return $this->afterpayApiClient->createOrder($data);  
    }

    public function getOrder($token) {
        return $this->afterpayApiClient->getOrder($token);
    }

    public function charge($order) { 
        $paymentDetails = [
			"token" => $order->afterpay_token,
			"merchantReference" => $order->id
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
            "redirectConfirmUrl" => "http://brooksrunning.test/afterpay_success",
            "redirectCancelUrl" => "http://brooksrunning.test/afterpay_cancel"
          ],
          "merchantReference" => $order->id,
        ];	
	}

}
