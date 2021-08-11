<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('pro_code');
            $table->string('pro_slug');
            $table->integer('pro_category_id')->unsigned();
            $table->foreign('pro_category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('pro_trademark_id')->unsigned();
            $table->foreign('pro_trademark_id')->references('id')->on('trademarks')->onDelete('cascade');
            $table->integer('pro_user_id')->unsigned();
            $table->foreign('pro_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('pro_source');
            $table->string('pro_manufacturing');
            $table->string('pro_machine_type');
            $table->string('pro_size');
            $table->string('pro_thickness');
            $table->string('pro_shell_material');
            $table->string('pro_rope_material');
            $table->string('pro_glass_material');
            $table->integer('pro_waterproof');
            $table->string('pro_function');
            $table->string('pro_guarantee');
            $table->string('pro_gender');
            $table->tinyInteger('pro_hot');
            $table->integer('pro_price_entry')->comment('giá nhập');
            $table->integer('pro_price');
            $table->integer('pro_sale');
            $table->integer('pro_amount');
            $table->integer('pro_amount_sell')->default(0);
            $table->integer('pro_view')->default(0);
            $table->text('pro_desc');
            $table->boolean('pro_status')->default('1');
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
        Schema::dropIfExists('products');
    }
}
