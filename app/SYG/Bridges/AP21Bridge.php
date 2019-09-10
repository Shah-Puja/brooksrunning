<?php

namespace App\SYG\Bridges;

use GuzzleHttp\Exception\RequestException;
use Exception;
use App\Models\Order;

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
        try {
            $response = $this->apiClient->get('Products?countryCode=AUFIT', ['http_errors' => true]);
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

        //return $this->apiClient->get('Products?countryCode=AUFIT')->getBody();
    }

    public function getProduct($productCode) {
        try {
            $response = $this->apiClient->get('Products/' . $productCode . '?countryCode=AUFIT', ['http_errors' => true]);
            if (!empty($response)) {
                return $response->getBody();
            }
        } catch (RequestException $e) {
            if ($e->getMessage() != '') {
                echo "aaa : ".$e->getMessage();
                return null;
            }
        } catch (\Exception $exception) {
            if ($exception->getMessage() != '') {
                echo "bbb : ".$exception->getMessage();
                return null;
            }
        }
        //return $this->apiClient->get('Products/' . $productCode . '?countryCode=AUFIT')->getBody();
    }

    public function getPersonid($email) {
        //return $this->apiClient->get('Persons/?countryCode=AUFIT&email=' . $email, ['http_errors' => false]);
        try {
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
        }
    }

    public function processPerson($data, $order_data) {
        //return $this->apiClient->post('Persons/?countryCode=AUFIT', ['body' => $data, 'http_errors' => false]);
        try {
            $response = $this->apiClient->post('Persons/?countryCode=AUFIT', ['body' => $data, 'http_errors' => true]);
            if (!empty($response)) {
                return $response;
            }
        } catch (RequestException $e) {
            if ($e->getMessage() != '') {

                $logger = array(
                    'order_id' => $order_data->id,
                    'log_title' => 'Person',
                    'log_type' => 'Response',
                    'log_status' => 'Error While Creating Person ID - RequestException',
                    'result' => $e->getMessage(),
                );
    
                $mail_data = array(
                    'api_name' => 'Create Person Error - RequestException',
                    'URL' => env('AP21_URL') . 'Persons/?countryCode=AUFIT',
                    'Result' => $e->getMessage(),
                    'Parameters' => $data,
                );

                Order::orderap21_alert($order_data, $mail_data, $logger);
                return null;
            }
        } catch (\Exception $exception) {
            if ($exception->getMessage() != '') {

                $logger = array(
                    'order_id' => $order_data->id,
                    'log_title' => 'Person',
                    'log_type' => 'Response',
                    'log_status' => 'Error While Creating Person ID - Exception',
                    'result' => $e->getMessage(),
                );
    
                $mail_data = array(
                    'api_name' => 'Create Person Error - Exception',
                    'URL' => env('AP21_URL') . 'Persons/?countryCode=AUFIT',
                    'Result' => $e->getMessage(),
                    'Parameters' => $data,
                );

                Order::orderap21_alert($order_data, $mail_data, $logger);
                return null;
            }
        }
    }

    public function processOrder($PersonId, $data, $order_data) {

        try {
            $response = $this->apiClient->post('Persons/' . $PersonId . '/Orders/?countryCode=AUFIT', ['body' => $data, 'http_errors' => true]);
            if (!empty($response)) {
                return $response;
            }
        } catch (RequestException $e) {
            if ($e->getMessage() != '') {
                    $logger = array(
                        'order_id' => $order_data->id,
                        'log_title' => 'Order',
                        'log_type' => 'Response',
                        'log_status' => 'Error While Creating Order - RequestException',
                        'result' => $e->getMessage(),
                    );
        
                    $mail_data = array(
                        'api_name' => 'Create Order Error - RequestException',
                        'URL' => env('AP21_URL') . 'Persons/' . $PersonId . '/Orders/?countryCode=AUFIT',
                        'Result' => $e->getMessage(),
                        'Parameters' => $data,
                    );

                    Order::orderap21_alert($order_data, $mail_data, $logger);
                return null;
            }
        } catch (\Exception $exception) {
            if ($exception->getMessage() != '') {
                    $logger = array(
                        'order_id' => $order_data->id,
                        'log_title' => 'Order',
                        'log_type' => 'Response',
                        'log_status' => 'Error While Creating Order - Exception',
                        'result' => $e->getMessage(),
                    );

                    $mail_data = array(
                        'api_name' => 'Create Order Error - Exception',
                        'URL' => env('AP21_URL') . 'Persons/' . $PersonId . '/Orders/?countryCode=AUFIT',
                        'Result' => $e->getMessage(),
                        'Parameters' => $data,
                    );

                    Order::orderap21_alert($order_data, $mail_data, $logger);
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
