<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('don_hang', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('ma_don_hang');
            $table->dateTime('ngay_dat_hang');
            $table->smallInteger('tinh_trang');
            $table->smallInteger('hinh_thuc_thanh_toan');
            $table->integer('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('don_hang');
    }
};
