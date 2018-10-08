<?php

namespace App\Payments;

use Zttp\Zttp;

class AfterpayApiClient {

    protected $config;

    public function __construct($config, $url) {
        $this->config = $config;
        $this->url = $url;
    }

    public function generateToken($orderdetails) {
        //return Zttp::withHeaders($this->config)->post($this->url . 'orders', $orderdetails)->body();
        $response = Zttp::withHeaders($this->config)->post($this->url . 'orders', $orderdetails);
        
        $response = $response->json();
        echo "<pre>";print_r($response);die;
    }

    public function getOrder($token) {
        return Zttp::withHeaders($this->config)->get($this->url . 'orders/' . $token)->body();
    }

}
