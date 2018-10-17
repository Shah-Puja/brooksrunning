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

}

