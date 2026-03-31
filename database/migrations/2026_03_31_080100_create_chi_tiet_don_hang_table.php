<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chi_tiet_don_hang', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->integer('ma_don_hang');
            $table->integer('sach_id');
            $table->integer('so_luong');
            $table->integer('don_gia');

            $table->primary(['ma_don_hang', 'sach_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_don_hang');
    }
};
