<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('i_order_id')->unsigned();
            $table->foreign('i_order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->string('i_product_code');
            $table->integer('i_amount');
            $table->integer('i_price');
            $table->integer('i_total');
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
        Schema::dropIfExists('items');
    }
}
