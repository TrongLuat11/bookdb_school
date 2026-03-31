<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('theloai', function (Blueprint $table) {
            $table->id();
            $table->string('ten_the_loai');
            $table->timestamps();
        });

        // Dữ liệu mẫu khớp với cột `sach.the_loai` đang dùng (1..3)
        DB::table('theloai')->insert([
            ['id' => 1, 'ten_the_loai' => 'Tiểu thuyết', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'ten_the_loai' => 'Truyện ngắn - Tản văn', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'ten_the_loai' => 'Tác phẩm kinh điển', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theloai');
    }
};
