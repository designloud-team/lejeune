<?php
/**
 * Created by PhpStorm.
 * User: nivan
 * Date: 2019-02-13
 * Time: 17:49
 */

if(!function_exists('convert_to_date')) {
    function convert_to_date($date, $format = null){
        if(!isset($date) || strlen($date)==0) {
            return '';
        }
        if($format == null){
            $format = 'F jS, Y g:i A';
        }
        $phpdate = strtotime( $date );
        $date = date( $format, $phpdate );

        return $date;
    }
}
if(!function_exists('new_orders')) {
    function new_orders(){
        $orders = \App\Order::all();
        $count = 0;
        foreach ($orders as $order)
        if($order->is_new){
            $count++;
        }
        return $count;
    }
}
if(!function_exists('hashid_encode')){
    function hashid_encode($value)
    {
        $hashids = new \Hashids\Hashids(config('app.key'), 10);
        return $hashids->encode($value);
    }
}
if(!function_exists('hashid_decode')){
    function hashid_decode($value)
    {
        $hashids = new \Hashids\Hashids(config('app.key'), 10);
        $decoded = $hashids->decode($value);

        return $decoded[0] ?? null;
    }
}