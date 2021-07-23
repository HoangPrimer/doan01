<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('r_user_id')->unsigned();
            $table->foreign('r_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('r_product_id')->unsigned();
            $table->foreign('r_product_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('r_star');
            $table->text('r_content');
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
        Schema::dropIfExists('rates');
    }
}
