<?php

use App\Order;
use DB;

function checkVoucher($order) {
    $voucher = \DB::table('voucher')
        ->where('voucher_code', $order->voucher_id)
        ->first();

    if ($voucher) {
        if ($order->total_price < $voucher->minimum_purchase) {
            return response('Minimum purchase of RM' . $voucher->minimum_purchase . 'is required to use this voucher.');
        } else {
            $order->total_price = ($voucher->discount * $order->total_price)/100;
            $order->save();
        }
    } else {
        return response('Voucher is either invalid or has been used.');
    }
}



