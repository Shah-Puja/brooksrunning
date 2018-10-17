<?php

namespace App\SYG\Bridges;

class EntrezoBridge implements BridgeInterface {

	public function processCart($data)
	{
		return "Processed cart from EntrezoBridge";
	}

	public function allProducts()
	{
		return "List of products from EntrezoBridge";	
	}

	public function getProduct($productCode)
	{
		return "Product Information for {$productCode} from EntrezoBridge";	
	}
}

