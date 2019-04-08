<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class ProcessVouchers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:vouchers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The command will process all vouchers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Process Vouchers');

        //Check Orders of Amy
        $orders = DB::table('customers')
            ->join('orders', 'customers.id', '=', 'orders.cust_id')
            ->select('customers.*', 'orders.*')
            ->where('customers.name', '=', 'Amy')
            ->get();

        //check orders of Amy
        foreach ($orders as $order){
            $this->info('Order ID : ' . $order->id);
            $this->info('Total Amount : ' . $order->total_amount);

            $this->alert('Checking Coupon Rules');

            $vouchers = DB::table('vouchers')->select('*')->get();

            if($order->total_amount > $vouchers[0]->min_purchase){

                if($vouchers[0]->disc_type == 'Percentage'){
                    $discount_amount =  ($order->total_amount * $vouchers[0]->disc_value) / 100;
                    $total_amount = $order->total_amount - $discount_amount;
                }
                elseif($vouchers[0]->disc_type == 'Percentage'){
                    $discount_amount =  ($order->total_amount - $vouchers[0]->disc_value);
                    $total_amount =  $order->total_amount - $discount_amount;
                }

                $this->info('Total Discount : RM ' . $discount_amount);
                $this->info('Payable Amount : RM ' . $total_amount);

            }
            else{
                $this->info('Not Eligible for Discount');
            }


        }



    }
}
