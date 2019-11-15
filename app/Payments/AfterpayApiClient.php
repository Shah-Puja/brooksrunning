<?php

namespace App\Payments;

use Zttp\Zttp;
use App\Models\Afterpay_log;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use Exception;

class AfterpayApiClient {

    protected $config;

    public function __construct($config, $url) {
        $this->config = $config;
        $this->url = $url;
    }

    public function createOrder($data)
	{   
		try {
			Afterpay_log::createNew([
				'api' => 'POST Order-API Order-id='.$data['merchantReference'],
				'url' => $this->url . 'orders',
				'body' => json_encode($data)
			]);
			$response = $this->config->post($this->url . 'orders', ['body' => $data, 'http_errors' => false]);
            if (!empty($response)) {                
                return $response;
            }
			//return Zttp::withHeaders($this->config)->post($this->url . 'orders', $data)->body();
		} catch (RequestException $e) {
            if ($e->getMessage() != '') {                
                Afterpay_log::createNew([
                    'api' => 'POST Order-API Order-id='.$data['merchantReference'],
                    'url' => $this->url . 'orders',
                    'error_response' => $e->getMessage(),
					'error_type' => 'Connectivity',
					'body' => json_encode($data)
                ]);
                return null;
            }
        } catch (\Exception $exception) {
            if ($exception->getMessage() != '') {
                return null;
            }
        }
	}

    public function getOrder($token,$orderID)
	{	
		try {
			Afterpay_log::createNew([
				'api' => 'GET Order-API Order-id='.$orderID,
				'url' => $this->url . 'orders/' . $token,
				'body' => "AfterPay token :". $token,
			]);
			$response = $this->config->get($this->url . 'orders/' . $token, ['http_errors' => false])->getBody();
            if (!empty($response)) {                
                return $response;
            }
			//return Zttp::withHeaders($this->config)->get($this->url . 'orders/' . $token)->body();	
		}catch (RequestException $e) {
            if ($e->getMessage() != '') {                
                Afterpay_log::createNew([
					'api' => 'GET Order-API Order-id='.$orderID,
					'url' => $this->url . 'orders/' . $token,
					'error_response' => $e->getMessage(),
					'error_type' => 'Connectivity',
					'body' => "AfterPay token :". $token,
				]);
                return null;
            }
        } catch (\Exception $exception) {
            if ($exception->getMessage() != '') {
                return null;
            }
        }
	}

	public function capturePayment($data)
	{ 
		try {
			Afterpay_log::createNew([
				'api' => 'POST Payment Capture Order-id='.$data['merchantReference'],
				'url' => $this->url . 'payments/capture',
				'body' => json_encode($data),
			]);
			$response = $this->config->post($this->url . 'payments/capture', ['body' => $data, 'http_errors' => false])->getBody();
            if (!empty($response)) {                
                return $response;
            }
			//return Zttp::withHeaders($this->config)->post($this->url . 'payments/capture', $data)->body();
		} catch (RequestException $e) {
            if ($e->getMessage() != '') {                
				Afterpay_log::createNew([
					'api' => 'POST Payment Capture Order-id='.$data['merchantReference'],
					'url' => $this->url . 'payments/capture',
					'error_response' => $e->getMessage(),
					'error_type' => 'Connectivity',
					'body' => json_encode($data)
				]);
                return null;
            }
        } catch (\Exception $exception) {
            if ($exception->getMessage() != '') {
                return null;
            }
        }
	}  
}
