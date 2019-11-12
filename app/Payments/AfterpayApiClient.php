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
		try {
			return Zttp::withHeaders($this->config)->post($this->url . 'orders', $data)->body();
		} catch (\Exception $e) {
			report($e);
			return false;
		}
	}

    public function getOrder($token)
	{	
		try {
			return Zttp::withHeaders($this->config)->get($this->url . 'orders/' . $token)->body();	
		} catch (\Exception $e) {
			report($e);
			return false;
		}
	}

	public function capturePayment($data)
	{ 
		try {
			return Zttp::withHeaders($this->config)->post($this->url . 'payments/capture', $data)->body();
		} catch (\Exception $e) {
			report($e);
			return false;
		}
	}  
}
