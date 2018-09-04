<?php

//break
use App\SalesOrder;
use DB;
use Carbon\Carbon;


/* Assumption 
1. salesOrder model will become parameter

*/

function applyVoucher(SalesOrder $salesOrder){

    if(!empty($salesOrder->voucherCode))
    {
        $now = Carbon::now();

        $voucher = \DB::table('vouchers')
                                ->where('code', $bill->voucherCode)
                                ->where('start_date', '<=', $now)
                                ->where('end_date', '>=', $now)
                                ->where('active')
                                ->first();

        if(!empty($voucher))
        {
            if($salesOrder->subtotal < $voucher->minimun_purchase)
                 return response(
                    'Sorry, did not meet minimun order amount.', 422
                );

            $salesOrder->discount_amount= calculateVoucherDiscount($salesOrder,$voucher);
            $salesOrder->recaculate(); //assume salesOrder model having function to update other column like total & tax
            $salesOrder->save();
            //maybe need to include salesOrder filtered to frontend to update or simply redirect.
              return response(
                    'Voucher Applied', 200
                );
        }
    }

   
    function calculateVoucherDiscount(SalesOrder $salesOrder, $voucher){
        $discountAmount=0;

        switch($voucher->type){

            case 'percentage' :  $voucherDiscountPercentage=  $voucher->amount/100;
                                $discountAmount = $salesOrder->subtotal * $voucherDiscountPercentage;

            break;

            case 'fixed_amount': $discountAmount = $voucher->amount;

            break;

    
        }

        return $discountAmount;

    }


}

?>