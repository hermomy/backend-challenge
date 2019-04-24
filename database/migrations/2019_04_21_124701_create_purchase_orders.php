<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaseorders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('requestor_id')->nullable();
            $table->integer('vendor_id')->nullable();
            $table->string('po_number');
            $table->string('po_description');
            $table->string('comments');
            $table->float('cost')->nullable();
            $table->dateTime('po_Date')->nullable();
            $table->dateTime('order_Date')->nullable();
            $table->dateTime('receive_Date')->nullable();
            $table->string('status_fufilment');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchaseorders');
    }
}
