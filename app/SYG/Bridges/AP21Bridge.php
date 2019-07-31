<?php

namespace App\SYG\Bridges;

use GuzzleHttp\Exception\RequestException;
use Exception;

class AP21Bridge implements BridgeInterface {

    protected $apiClient;

    public function __construct($apiClient) {
        $this->apiClient = $apiClient;
    }

    public function processCart($data) {
        //return $this->apiClient->put('Carts/1234?countryCode=AUFIT', ['body' => $data])->getBody();
        try {
            $response = $this->apiClient->put('Carts/1234?countryCode=AUFIT', ['body' => $data, 'http_errors' => true]);
            if (!empty($response)) {
                return $response->getBody();
            }
        } catch (RequestException $e) {
            if ($e->getMessage() != '') {
                return null;
            }
        } catch (\Exception $exception) {
            if ($exception->getMessage() != '') {
                return null;
            }
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
        /*try {
            $response = $this->apiClient->get('Persons/?countryCode=AUFIT&email=' . $email, ['http_errors' => true]);
            if (!empty($response)) {
                return $response;
            }
        } catch (RequestException $e) {
            if ($e->getMessage() != '') {
                return null;
            }
        } catch (\Exception $exception) {
            if ($exception->getMessage() != '') {
                return null;
            }
        }*/
    }

    public function processPerson($data) {
        return $this->apiClient->post('Persons/?countryCode=AUFIT', ['body' => $data, 'http_errors' => false]);
        /*try {
            $response = $this->apiClient->post('Persons/?countryCode=AUFIT', ['body' => $data, 'http_errors' => true]);
            if (!empty($response)) {
                return $response;
            }
        } catch (RequestException $e) {
            if ($e->getMessage() != '') {
                return null;
            }
        } catch (\Exception $exception) {
            if ($exception->getMessage() != '') {
                return null;
            }
        }*/
    }

    public function processOrder($PersonId, $data) {
        try {
            $response = $this->apiClient->post('Persons/' . $PersonId . '/Orders/?countryCode=AUFIT', ['body' => $data, 'http_errors' => true]);
            if (!empty($response)) {
                return $response;
            }
        } catch (RequestException $e) {
            if ($e->getMessage() != '') {
                return null;
            }
        } catch (\Exception $exception) {
            if ($exception->getMessage() != '') {
                return null;
            }
        }
        //return $this->apiClient->post('Persons/' . $PersonId . '/Orders/?countryCode=AUFIT', ['body' => $data, 'http_errors' => false]);
    }

    public function vouchervalid($gift, $pin, $amount) {
        //return $this->apiClient->get('Voucher/GVValid/'.$gift.'?pin='.$pin.'&amount='.$amount.'&countryCode=AUFIT', ['http_errors' => false]);
        try {
            $response = $this->apiClient->get('Voucher/GVValid/' . $gift . '?pin=' . $pin . '&amount=' . $amount . '&countryCode=AUFIT', ['http_errors' => true]);
            if (!empty($response)) {
                return $response;
            }
        } catch (RequestException $e) {
            if ($e->getMessage() != '') {
                return null;
            }
        } catch (\Exception $exception) {
            if ($exception->getMessage() != '') {
                return null;
            }
        }
    }

    public function sync_ap21_sku($prod_styleidx) {
        //return $this->apiClient->get('Products/' . $prod_styleidx . '?countryCode=AUFIT', ['http_errors' => false]);
        try {
            $response = $this->apiClient->get('Products/' . $prod_styleidx . '?countryCode=AUFIT', ['http_errors' => true]);
            if (!empty($response)) {
                return $response;
            }
        } catch (RequestException $e) {
            if ($e->getMessage() != '') {
                return null;
            }
        } catch (\Exception $exception) {
            if ($exception->getMessage() != '') {
                return null;
            }
        }
    }

    public function processCartManual($data) {
        return $this->apiClient->put('Carts/1234?countryCode=AUFIT', ['body' => $data])->getBody();
    }

    public function getPersonidManual($email) {
        return $this->apiClient->get('Persons/?countryCode=AUFIT&email=' . $email, ['http_errors' => false]);
    }

    public function processPersonManual($data) {
        return $this->apiClient->post('Persons/?countryCode=AUFIT', ['body' => $data, 'http_errors' => false]);
    }

    public function vouchervalidManual($gift, $pin, $amount) {
        return $this->apiClient->get('Voucher/GVValid/' . $gift . '?pin=' . $pin . '&amount=' . $amount . '&countryCode=AUFIT', ['http_errors' => false]);
    }

    public function processOrderManual($PersonId, $data) {
        return $this->apiClient->post('Persons/' . $PersonId . '/Orders/?countryCode=AUFIT', ['body' => $data, 'http_errors' => false]);
    }

}
