<?php

namespace App\SYG\Bridges;
use GuzzleHttp\Exception\RequestException;

class AP21Bridge implements BridgeInterface {

	protected $apiClient;
	public function __construct($apiClient)
	{
		$this->apiClient = $apiClient;
	}

	public function processCart($data)
	{
		return $this->apiClient->put('Carts/1234?countryCode=AUFIT', ['body' => $data])->getBody();
	}

	public function allProducts()
	{
		return $this->apiClient->get('Products?countryCode=AUFIT')->getBody();
	}

	public function getProduct($productCode)
	{
		return $this->apiClient->get('Products/' . $productCode . '?countryCode=AUFIT')->getBody();
	}
	
	public function getPersonid($email)
	{
		//return $this->apiClient->get('Persons/?countryCode=AUFIT&email=' . $email, ['http_errors' => false]);

		try {
			$response = $this->apiClient->get('Persons/?countryCode=AUFIT&email=' . $email);
			return $response;
		}catch (RequestException $e) {

				// Catch all 4XX errors 
			
				// To catch exactly error 400 use 
				if ($e->getResponse()->getStatusCode() == '400') {
						echo "Got response 400";
				}
			
				// You can check for whatever error status code you need 
			
			} catch (\Exception $e) {
			
				// There was another exception.
			
			}
	}

}

