<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('cm_product_id')->unsigned();
            $table->foreign('cm_product_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('cm_user_id')->unsigned();
            $table->foreign('cm_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('cm_content');
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
        Schema::dropIfExists('comments');
    }
}
