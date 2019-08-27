<?php

namespace App\Http\Controllers;

use App\Models\Order;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Order_item;
use App\Http\Controllers\MedibankController;

class testmedibankcsv extends Controller {

    public function __construct() {
        
    }

    public function export_medibank_order_csv() {
        $columns = array('TransactionID', 'OrderReferenceID', 'TransactionTypeCode', 'RefundCorrelationID', 'CorporateID', 'PolicyNumber', 'GivenName', 'FamilyName', 'BirthDate', 'EmailURI', 'TransactionDateTime', 'TransactionLocation', 'EligibleTransactionTotal', 'CurrencyCode', 'TransactionTier');
        //$filename = 'Brooks_5000001033_' . date('Ymd_His') . '.csv';
        //LOYALTY_UNLINKEDEARNTRANSACTIONS_5000002476_YYYYMMDDHHMMSS.csv
        $filename = 'LOYALTY_UNLINKEDEARNTRANSACTIONS_5000002476_' . date('YmdHis') . '.csv';
        $out = fopen('../testcsv/' . $filename, 'w');
        fputcsv($out, $columns);
        $medibank_orders = DB::table('orders')->where('orders.transaction_status', 'Succeeded')->where('orders.order_type', 'like', '%medibank%')->whereNull('orders.medibank_csv')->orderby('id', 'asc')->get();
        if (!empty($medibank_orders)) {
            foreach ($medibank_orders as $medibank_order) {
                $order_record = DB::table('orders')
                                ->join('order_addresses', 'orders.id', '=', 'order_addresses.order_id')
                                ->join('order_items', 'orders.id', '=', 'order_items.order_id')
                                ->where('orders.order_type', 'like', '%medibank%')->whereNull('orders.medibank_csv')
                                ->where('orders.transaction_status', 'Succeeded')
                                ->where('orders.id', $medibank_order->id)
                                ->select('orders.*', 'order_items.id as order_item_id', 'order_addresses.email', 'order_addresses.s_fname', 'order_addresses.s_lname', 'order_items.price_sale', 'order_items.price')->get();

                foreach ($order_record as $record) {
                    if ($record->price_sale > 0 && $record->price_sale < $record->price) {
                        //$transactiontypecode = 'SALE';
                        $transaction_tier = '2';
                        $transaction_amount = $record->price_sale;
                    } else {
                        //$transactiontypecode = 'FULL-PRICE';
                        $transaction_tier = '1';
                        $transaction_amount = $record->price;
                    }
                    $transactiontypecode = 'SALE';
                    $policy_number = ($record->policy_no) ? $record->policy_no : '';
                    $transaction_dt = strtotime($record->transaction_dt);
                    date_default_timezone_set("UTC");
                    $transaction_dt = str_replace('+00:00', '.000Z', gmdate('c', $transaction_dt)); //format given eg.: 2018-03-15T18:15:10.235Z
                    $uuid = (new MedibankController)->generateUUID();
                    fputcsv($out, array($uuid, $record->order_no, $transactiontypecode, '', env('MEDIBANK_CORPORATEID'), $policy_number, '', '', '', $record->email, $transaction_dt, 'Brooks', $transaction_amount, 'aud', $transaction_tier));
                    $orderitemDataUpdate = array(
                        'medibank_uuid' => $uuid
                    );
                    Order_item::where('id', $record->order_item_id)->update($orderitemDataUpdate);
                    //fputcsv($out, array($record->id . "-" . $record->transaction_id, $record->order_no, $transactiontypecode, '', env('MEDIBANK_CORPORATEID'), $policy_number, '', '', '', $record->email, $transaction_dt, 'Brooks', $transaction_amount, 'aud', $transaction_tier));
                }

                //update medibank_csv field in order table
                $orderDataUpdate = array(
                    'medibank_csv' => $filename,
                    'policy_no' => NULL
                );
                Order::where('id', $medibank_order->id)->update($orderDataUpdate);
            }
            fclose($out);
        }
        //Storage::disk('sftp')->put('/Earn/' . $filename, fopen('../testcsv/' . $filename, 'r+'));
    }

}
