<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('travels', function (Blueprint $table) {
            // Kolom approval
            $table->enum('status_approval', ['pending', 'approved', 'rejected'])
                ->default('pending')
                ->after('status');

            // Timestamp approval
            $table->timestamp('submitted_at')->nullable()->after('status_approval');
            $table->timestamp('reviewed_at')->nullable()->after('submitted_at');

            // Admin yang review
            $table->foreignId('reviewed_by')->nullable()
                ->after('reviewed_at')
                ->constrained('users')
                ->onDelete('set null');

            // Alasan reject
            $table->text('rejection_reason')->nullable()->after('reviewed_by');

            // Index untuk performa
            $table->index('status_approval');
            $table->index(['lokasi_asal', 'lokasi_tujuan', 'status_approval']);
        });
    }

    public function down(): void
    {
        Schema::table('travels', function (Blueprint $table) {
            $table->dropForeign(['reviewed_by']);
            $table->dropIndex(['status_approval']);
            $table->dropIndex(['lokasi_asal', 'lokasi_tujuan', 'status_approval']);
            $table->dropColumn([
                'status_approval',
                'submitted_at',
                'reviewed_at',
                'reviewed_by',
                'rejection_reason'
            ]);
        });
    }
};

