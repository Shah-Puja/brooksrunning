<?php

namespace App\Payments;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class Processor
{
	protected $paymentgateway;
	public function __construct($paymentgateway)
	{
		$this->paymentgateway = $paymentgateway;
	}

	public function getToken()
	{
		return $this->paymentgateway->clientToken()->generate();
	}

	public function charge($order)
	{   
		$amount = number_format($order->grand_total, 2, '.', '');
		$order_items=[];
		foreach($order->orderItems as $item){
			$order_items[]=[
				'name' => 'Product',
				'kind' => 'debit',
				'quantity' => $item->qty,
				'unitAmount' => $item->price_sale,
				//'unitOfMeasure' => 'unit',
				'totalAmount' => $item->total,
				//'taxAmount' => '5.00',
				'discountAmount' => $item->discount,
				'productCode' => $item->style,
			];
		}

		$result = $this->paymentgateway->transaction()->sale([
		  'amount' => $amount,
		  'orderId' => $order->id,
		  'paymentMethodNonce' => request('payment_method_nonce'),
		  'options' => [
		    'submitForSettlement' => True
		  ],
		  'lineItems' => $order_items,
		]);
		
		if (! $result->success) {
			$message = Carbon::now() . " - Payment Failed! {$amount} for order: {$order->id} cart: {$order->cart_id}, Braintree Transaction ID {$result->transaction->id} - {$result->transaction->status}";
			Log::info($message);
			return false;		
		}

		$transaction = $this->paymentgateway->transaction()->find($result->transaction->id);

		if ( $transaction->amount === $amount && $transaction->processorResponseCode =='1000') {
			return $transaction;
		}

		// Handle the hacker possibility of amounts not matching up
		abort(500);

	}

}