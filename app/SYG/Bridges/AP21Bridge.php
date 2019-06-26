<?php

namespace App\SYG\Bridges;

use GuzzleHttp\Exception\RequestException;

class AP21Bridge implements BridgeInterface {

    protected $apiClient;

    public function __construct($apiClient) {
        $this->apiClient = $apiClient;
    }

    public function processCart($data) {
        //return $this->apiClient->put('Carts/1234?countryCode=AUFIT', ['body' => $data])->getBody();
        try {
            $response = $this->apiClient->put('Carts/1234?countryCode=AUFIT', ['body' => $data, 'http_errors' => false]);
            //echo $response->getStatusCode();
            if ($response->getStatusCode() == 200) {
                return $response->getBody();
            }
        } catch (RequestException $e) {
            throw $e;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function allProducts() {
        return $this->apiClient->get('Products?countryCode=AUFIT')->getBody();
    }

    public function getProduct($productCode) {
        return $this->apiClient->get('Products/' . $productCode . '?countryCode=AUFIT')->getBody();
    }

    public function getPersonid($email) {
        return $this->apiClient->get('Persons/?countryCode=AUFIT&email=' . $email, ['http_errors' => false]);
    }

    public function processPerson($data) {
        return $this->apiClient->post('Persons/?countryCode=AUFIT', ['body' => $data, 'http_errors' => false]);
    }

    public function processOrder($PersonId, $data) {
        return $this->apiClient->post('Persons/' . $PersonId . '/Orders/?countryCode=AUFIT', ['body' => $data, 'http_errors' => false]);
    }

    public function vouchervalid($gift, $pin, $amount) {
        //return $this->apiClient->get('Voucher/GVValid/'.$gift.'?pin='.$pin.'&amount='.$amount.'&countryCode=AUFIT', ['http_errors' => false]);
        try {
            $response = $this->apiClient->get('Voucher/GVValid/' . $gift . '?pin=' . $pin . '&amount=' . $amount . '&countryCode=AUFIT', ['http_errors' => false]);
			if ($response->getStatusCode() == 200) {
				return $response;
			}
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function sync_ap21_sku($prod_styleidx) {
        return $this->apiClient->get('Products/' . $prod_styleidx . '?countryCode=AUFIT', ['http_errors' => false]);
    }

}
