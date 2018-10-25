<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_log extends Model
{
    protected $table = 'order_log';
    protected $fillable = ['order_id'];

    public static function createNew($order_id, $log_title, $log_type='', $log_status='', $result='', $xml = '', $nab_txnid = '', $nab_result = ''){
        $logger = array(
            'order_id'      => $order_id,
            'log_title'     => $log_title,
            'log_type'      => $log_type,
            'log_status'    => $log_status,
            'result'        => $result,
            'xml'           => (!empty($xml))? $xml:'',
            'nab_txnid'     => $nab_txnid,
            'nab_result'    => $nab_result
        );
        self::create($logger); 
    }
}
