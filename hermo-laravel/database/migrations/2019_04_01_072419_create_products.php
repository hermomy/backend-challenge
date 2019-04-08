<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('prod_id');
            $table->string('sku_code');
            $table->string('name');
            $table->string('desc');
            $table->bigInteger('quantity');
            $table->bigInteger('sell_price');
            $table->bigInteger('cost_price');
            $table->string('tray_loc');
            $table->string('on_sale');
            $table->timestamps();

            ;


        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
