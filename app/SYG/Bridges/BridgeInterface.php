<?php

namespace App\SYG\Bridges;

interface BridgeInterface {
	public function allProducts();
	public function getProduct($productCode);
	public function processCart($data);
	public function getPersonid($email,$object_id);
}