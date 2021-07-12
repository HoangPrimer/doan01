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
            $table->string('MaSP');
            $table->string('ThuongHieu');
            $table->string('NguonGoc');
            $table->string('KieuMay');
            $table->integer('KichCo');
            $table->integer('DoDay');
            $table->string('ChatLieuVo');
            $table->string('ChatLieuDay');
            $table->string('ChatLieuKinh');
            $table->integer('DoChiuNuoc');
            $table->string('ChucNang');
            $table->string('BaoHanh');
            $table->string('GioiTinh');
            $table->string('Hot');
            $table->integer('GiaNhap');
            $table->integer('GiaBan');
            $table->integer('GiaKM');
            $table->integer('SoLuong');
            $table->integer('SoLuongBan')->default('0');
            $table->text('MoTa');
            $table->boolean('Flag_Delete')->default('0');
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
