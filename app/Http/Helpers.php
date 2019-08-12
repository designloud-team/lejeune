<?php
/**
 * Created by PhpStorm.
 * User: nivan
 * Date: 2019-02-13
 * Time: 17:49
 */

if(!function_exists('convert_to_date')) {
    function convert_to_date($date, $format = null){
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