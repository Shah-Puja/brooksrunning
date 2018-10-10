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
        $data = [
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
        ];
        return $this->afterpayApiClient->generateToken($data);
    }

    public function getOrder($token) {
        return $this->afterpayApiClient->getOrder($token);
    }

    public function charge($order) {
        return true;
    }

}
