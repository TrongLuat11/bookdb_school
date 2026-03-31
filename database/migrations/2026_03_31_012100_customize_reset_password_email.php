<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Thay doi noi dung email reset password:
     * - Tao custom notification ResetPasswordNotification voi noi dung tieng Viet
     * - Override sendPasswordResetNotification() trong User model
     */
    public function up(): void
    {
        // Migration nay danh dau thay doi logic gui email reset password.
        // Khong co thay doi database schema.
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Khong co thay doi database schema can rollback.
    }
};
