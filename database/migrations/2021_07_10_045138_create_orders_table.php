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
            $table->integer('Customer_id')->unsigned();
            $table->foreign('Customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->string('TrangThai');
            $table->string('Name');
            $table->integer('Phone');
            $table->string('Address');
            $table->string('Gender');
            $table->string('Email');
            $table->integer('TongTien');
            $table->string('HinhThucThanhToan');
            $table->string('GhiChu');
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
