<?php

namespace App\SYG\Bridges;

use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use Exception;
use App\Models\Order;
use App\Models\Ap21_error;

class AP21Bridge implements BridgeInterface {

    protected $apiClient;

    public function __construct($apiClient) {
        $this->apiClient = $apiClient;
    }

    public function processCart($data) {
        //return $this->apiClient->put('Carts/1234?countryCode=AUFIT', ['body' => $data])->getBody();
        $url='Carts/1234?countryCode=AUFIT';
        try {
            $response = $this->apiClient->put($url, ['body' => $data, 'http_errors' => true]);
            if (!empty($response)) {
                return $response->getBody();
            }
        } catch (RequestException $e) {
            if ($e->getMessage() != '') {
                //Order::ap21_error('Cart-API',$url,$data,session('cart_id'),$e->getMessage());
                return null;
            }
        } catch (\Exception $exception) {
            if ($exception->getMessage() != '') {
                //Order::ap21_error('Cart-API',$url,$data,session('cart_id'),$exception->getMessage());
                return null;
            }
        }
    }

    public function allProducts() {
        $url='Products?countryCode=AUFIT';
        try {
            $response = $this->apiClient->get($url, ['http_errors' => true]);
            if (!empty($response)) {
                return $response->getBody();
            }
        } catch (RequestException $e) {
            if ($e->getMessage() != '') {
                //Order::ap21_error('Product API',$url,'Get all products','',$e->getMessage());
                return null;
            }
        } catch (\Exception $exception) {
            if ($exception->getMessage() != '') {
                //Order::ap21_error('Product API',$url,'Get all products','',$exception->getMessage());
                return null;
            }
        }

        //return $this->apiClient->get('Products?countryCode=AUFIT')->getBody();
    }

    public function getProduct($productCode) {
        $url='Products/' . $productCode . '?countryCode=AUFIT';
        try {
            $response = $this->apiClient->get($url, ['http_errors' => true]);
            if (!empty($response)) {
                return $response->getBody();
            }
        } catch (RequestException $e) {
            if ($e->getMessage() != '') {
                //Order::ap21_error('Product API',$url,'product code : '.$productCode ,'',$e->getMessage());
                echo "aaa : ".$e->getMessage();
                return null;
            }
        } catch (\Exception $exception) {
            if ($exception->getMessage() != '') {
                //Order::ap21_error('Product API',$url,'product code : '.$productCode ,'',$exception->getMessage());
                echo "bbb : ".$exception->getMessage();
                return null;
            }
        }
        //return $this->apiClient->get('Products/' . $productCode . '?countryCode=AUFIT')->getBody();
    }

    public function getPersonid($email,$order_id='0') {
        $api_string = '';
        if($order_id!=0) {
            $api_string = "/Payment - OrderId=".$order_id;
        }
        //return $this->apiClient->get('Persons/?countryCode=AUFIT&email=' . $email, ['http_errors' => false]);
        $url='Persons/?countryCode=AUFIT&email=' . $email;        
        try {
            $response = $this->apiClient->get($url, ['http_errors' => false]);
            if (!empty($response)) {                
                return $response;
            }
        } catch (RequestException $e) {
            if ($e->getMessage() != '') {
                Ap21_error::store([
                    'api' => 'GET Person-API'.$api_string,
                    'url' => env('AP21_URL') .$url,
                    'error_response' => $e->getMessage(),
                    'error_type' => 'Connectivity',
                ]);
                return null;
            }
        } catch (\Exception $exception) {
                return null;
        }
    }

    public function processPerson($data,$order_id='0') {
        //return $this->apiClient->post('Persons/?countryCode=AUFIT', ['body' => $data, 'http_errors' => false]);
        $api_string = '';
        if($order_id!=0) {
            $api_string = "/Payment - OrderId=".$order_id;
        }
        $url='Persons/?countryCode=AUFIT';
        try {
            $response = $this->apiClient->post($url, ['body' => $data, 'http_errors' => false]);
            if (!empty($response)) {
                return $response;
            }
        } catch (RequestException $e) {
            if ($e->getMessage() != '') {                
                Ap21_error::store([
                    'api' => 'POST Person-API'.$api_string,
                    'url' => env('AP21_URL') .$url,
                    'error_response' => $e->getMessage(),
                    'error_type' => 'Connectivity',
                    'body' => $data,
                ]);
                return null;
            }
        } catch (\Exception $exception) {
            if ($exception->getMessage() != '') {
                return null;
            }
        }
    }

    public function updatePerson($date,$userid) {
       
        $url='Persons/'.$userid.'/?countryCode=AUFIT';
        try {
            $response = $this->apiClient->put($url, ['body' => $data, 'http_errors' => false]);
            if (!empty($response)) {
                print_r($response);
                exit;
                return $response;
            }
        } catch (RequestException $e) {
            if ($e->getMessage() != '') {                
                Ap21_error::store([
                    'api' => 'Put Person-API/Register',
                    'url' => env('AP21_URL') .$url,
                    'error_response' => $e->getMessage(),
                    'error_type' => 'Connectivity',
                    'body' => $data,
                ]);
                return null;
            }
        } catch (\Exception $exception) {
            if ($exception->getMessage() != '') {
                return null;
            }
        }
    }

    public function processOrder($PersonId, $data, $order_id) {
        $url='Persons/' . $PersonId . '/Orders/?countryCode=AUFIT';
        try {
            $response = $this->apiClient->post($url, ['body' => $data, 'http_errors' => false]);
            if (!empty($response)) {
                return $response;
            }
        } catch (RequestException $e) {
            if ($e->getMessage() != '') {
                Ap21_error::store([
                    'api' => 'Order-API - OrderId='.$order_id,
                    'url' => env('AP21_URL') .$url,
                    'error_response' => $e->getMessage(),
                    'error_type' => 'Connectivity',
                    'body' => $data,
                ]);
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
        $url='Voucher/GVValid/' . $gift . '?pin=' . $pin . '&amount=' . $amount . '&countryCode=AUFIT';
        $data = 'Pin = ' . $pin . ', Gift = '. $gift. ' and Amount = ' . $amount ;
        try {
            $response = $this->apiClient->get($url, ['http_errors' => true]);
            if (!empty($response)) {
                return $response;
            }
        } catch (RequestException $e) {
            if ($e->getMessage() != '') {
                //Order::ap21_error('Voucher API',$url,$data, session('cart_id') ,$e->getMessage());
                return null;
            }
        } catch (\Exception $exception) {
            if ($exception->getMessage() != '') {
                //Order::ap21_error('Voucher API',$url,$data, session('cart_id') ,$exception->getMessage());
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
