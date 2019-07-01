<?php

namespace App\Http\Controllers;

use App\Models\Order;
use DB;

class testmedibankcsv extends Controller {

    protected $client;

    public function __construct() {
        
    }

    public function export_medibank_order_csv() {
        $medibank_order = DB::table('orders')->where('orders.transaction_status', 'Succeeded')->where('orders.order_type', 'like', '%medibank%')->whereNull('orders.medibank_csv')->orderby('id','asc')->first();
        //echo "<pre>";print_r($medibank_order->id);die;
        $columns = array('TransactionID', 'OrderReferenceID', 'TransactionTypeCode', 'RefundCorrelationID', 'CorporateID', 'PolicyNumber', 'GivenName', 'FamilyName', 'BirthDate', 'EmailURI', 'TransactionDateTime', 'TransactionLocation', 'EligibleTransactionTotal', 'CurrencyCode', 'TransactionTier');
        $filename = date('dmYHis') . '.csv';
        $out = fopen('../testcsv/' . $filename, 'w');
        fputcsv($out, $columns);
        $order_record = DB::table('orders')
        ->join('order_addresses', 'orders.id', '=', 'order_addresses.order_id')
        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->where('orders.order_type', 'like', '%medibank%')->whereNull('orders.medibank_csv')
        ->where('orders.transaction_status', 'Succeeded')
        ->where('orders.id', $medibank_order->id)
        ->select('orders.*','order_addresses.email','order_addresses.s_fname','order_addresses.s_lname','order_items.price_sale','order_items.price')->get();
        
        foreach ($order_record as $record) {
            if ($record->price_sale > 0 && $record->price_sale < $record->price) {
                $transactiontypecode = 'SALE';
                $transaction_tier = '2';
                $transaction_amount = $record->price_sale;
            } else {
                $transactiontypecode = 'FULL-PRICE';
                $transaction_tier = '1';
                $transaction_amount = $record->price;
            }
            $policy_number = '';
            
            fputcsv($out, array($record->id . "-" . $record->transaction_id, $record->order_no, $transactiontypecode, '' , env('MEDIBANK_CORPORATEID'), $policy_number, $record->s_fname, $record->s_lname, '', $record->email, date('d F Y', strtotime($record->transaction_dt)), 'Brooks', $transaction_amount, 'AUD', $transaction_tier ));
        }
        fclose($out);
        //update medibank_csv field in order table
        $orderDataUpdate = array(
            'medibank_csv' => $filename
        );
        Order::where('id', $medibank_order->id)->update($orderDataUpdate); 
    }

}
