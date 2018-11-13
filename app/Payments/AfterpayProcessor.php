<?php

namespace App\Payments;
use App\Payments\AfterpayApiClient;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class AfterpayProcessor {

    protected $afterpayApiClient;

    public function __construct($afterpayApiClient) {
        $this->afterpayApiClient = $afterpayApiClient;
    }

    public function getAfterpayToken($order) { 
        $data = $this->prepareOrderData($order);
		    return $this->afterpayApiClient->createOrder($data);  
    }

    public function getOrder($token) {
        return $this->afterpayApiClient->getOrder($token);
    }

    public function charge($order) { 
        $paymentDetails = [
        "token" => $order->afterpay_token,
        "merchantReference" => $order->id
        ];
		    return $this->afterpayApiClient->capturePayment($paymentDetails);
    }

    protected function prepareOrderData($order)
	{ 
    foreach($order->orderItems as $order_item){ 
      if($order_item->price_sale!=0 && $order_item->price!=$order_item->price_sale){
        $price = $order_item->price_sale; 
      } else {
        $price = $order_item->price; 
      }
        
      $order_items[] = ["name" => $order_item->variant->product->stylename, "sku" => $order_item->variant_id,
        "quantity" => $order_item->qty,
          "price" => ["amount" => $price , "currency" => "AUD"],
        ];
    }  
    $address_shipping = ["name" => $order->address->s_fname . " " . $order->address->s_lname,
            "line1" => $order->address->s_add1,
            "line2" => $order->address->s_add2, "suburb" => $order->address->s_city,
            "state" => $order->address->s_state, "postcode" => $order->address->s_postcode, "countryCode" => "AU",
            "phoneNumber" => $order->address->s_phone];

		return [  
          "totalAmount" => [
            "amount" => $order->grand_total,
            "currency" => "AUD"
          ],
          "consumer" => [ 
            "phoneNumber" => $order->address->b_phone,
            "givenNames" => $order->address->b_fname,
            "surname" => $order->address->b_lname,
            "email" => $order->address->email
          ], 
          "merchant" => [
            "redirectConfirmUrl" => config('app.url') . "/afterpay_success",
            "redirectCancelUrl" => config('app.url') . "/afterpay_cancel"
          ],
          "merchantReference" => $order->id,
          "items" => $order_items,
          "shipping" => $address_shipping
        ];	
	}

}
