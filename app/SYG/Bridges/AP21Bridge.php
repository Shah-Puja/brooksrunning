<?php

namespace App\SYG\Bridges;

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
		return $this->apiClient->get('Persons/?countryCode=AUFIT&email=' . $email, ['http_errors' => false]);
	}

	public function processPerson($data)
	{
		return $this->apiClient->put('Persons/?countryCode=AUFIT', ['body' => $data , 'http_errors' => false]);
	}

}

