<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('od_customer_id')->unsigned();
            $table->foreign('od_customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->tinyInteger('od_status');
            $table->string('od_code');
            $table->string('od_name');
            $table->string('od_phone');
            $table->string('od_address');
            $table->string('od_gender');
            $table->string('od_email');
            $table->integer('od_total');
            $table->string('od_payment');
            $table->string('od_note')->nullable();
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
        Schema::dropIfExists('orders');
    }
}