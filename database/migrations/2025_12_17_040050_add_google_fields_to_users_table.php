<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Cek dulu apakah kolom sudah ada sebelum menambahkan
            if (!Schema::hasColumn('users', 'google_id')) {
                $table->string('google_id')->nullable()->after('email');
            }

            if (!Schema::hasColumn('users', 'avatar_path')) {
                $table->string('avatar_path')->nullable()->after('google_id');
            }

            if (!Schema::hasColumn('users', 'otp_code')) {
                $table->string('otp_code')->nullable();
            }

            if (!Schema::hasColumn('users', 'otp_expires_at')) {
                $table->timestamp('otp_expires_at')->nullable();
            }

            if (!Schema::hasColumn('users', 'is_verified')) {
                $table->boolean('is_verified')->default(false);
            }

            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('user');
            }

            if (!Schema::hasColumn('users', 'no_wa')) {
                $table->string('no_wa')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'google_id',
                'avatar_path',
                'otp_code',
                'otp_expires_at',
                'is_verified',
                'role',
                'no_wa'
            ]);
        });
    }
};