<?php

namespace App\Payments;

use Zttp\Zttp;

class AfterpayApiClient {

    protected $config;

    public function __construct($config, $url) {
        $this->config = $config;
        $this->url = $url;
    }

    public function createOrder($data)
	{   
		echo $this->url . 'orders';
		exit;
		return Zttp::withHeaders($this->config)->post($this->url . 'orders', $data)->body();
	}

    public function getOrder($token)
	{
		return Zttp::withHeaders($this->config)->get($this->url . 'orders/' . $token)->body();	
	}

	public function capturePayment($data)
	{
		return Zttp::withHeaders($this->config)->post($this->url . 'payments/capture', $data)->body();
	}  
}
