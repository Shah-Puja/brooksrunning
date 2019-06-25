<?php

namespace App\Http\Controllers;

use App\Models\Order;
use DB;

class testmedibankcsv extends Controller {

    protected $client;

    public function __construct() {
        
    }

    public function export_medibank_order_csv() {
        /*$columns = array('TransactionID', 'OrderReferenceID', 'TransactionTypeCode', 'RefundCorrelationID', 'CorporateID', 'PolicyNumber', 'GivenName', 'FamilyName', 'BirthDate', 'EmailURI', 'TransactionDateTime', 'TransactionLocation', 'EligibleTransactionTotal', 'CurrencyCode', 'TransactionTier');
        $filename = date('dmYHis') . '.csv';
        $out = fopen('../testcsv/' . $filename, 'w');
        fputcsv($out, $columns);*/
        $order_records = DB::table('orders')
        ->join('order_addresses', 'orders.id', '=', 'order_addresses.order_id')
        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->where('orders.order_type', 'like', '%medibank%')->whereNull('orders.medibank_csv')
        ->where('orders.transaction_status', 'Succeeded')
        ->select('orders.*','order_addresses.email','order_addresses.s_fname','order_addresses.s_lname','order_items.price_sale','order_items.price')->first();
        echo "<pre>";print_r($order_records);die;
        /*fputcsv($out, array($order_record->id . "-" . $order_record->transaction_id, $order_record->order_no));
        fclose($out);
        //update medibank_csv field in order table
        $orderDataUpdate = array(
            'medibank_csv' => $filename
        );
        Order::where('id', $order_record->id)->update($orderDataUpdate);*/
    }

}
