<?php

namespace App\Http\Controllers;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Order;

class testmedibankcsv extends Controller {

    protected $client;

    public function __construct() {
    }

    public function export_medibank_order_csv() { 
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=file.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );
        $order_records_arr = array();
        $order_records =Order::where('order_type', 'like' , '%medibank%')->where('transaction_status', 'Succeeded')->get();
        foreach($order_records as $order_record){
            $order_record_arr['transaction_id'] = $order_record->id."-".$order_record->transaction_id;
            $order_record_arr['ref_id'] = $order_record->order_no;
            $order_records_arr[] = $order_record_arr;
        }
         
        $columns = array('TransactionID', 'OrderReferenceID');
    
        $callback = function() use ($order_records_arr, $columns)
        {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
    
            foreach($order_records_arr as $order_record_arr) {
                fputcsv($file, array($order_record_arr->transaction_id, $order_record_arr->ref_id));
            }
            fclose($file);
        };
        $pathToFile = '/testcsv/';
        return response()->download($callback,['Content-Description' =>  'File Transfer','Content-Type' => 'application/octet-stream','Content-Disposition' => 'attachment; filename=import.csv']);


        //return response()->streamDownload($callback, 'prefix-' . date('d-m-Y-H:i:s').'.csv', $headers);
    }

}
