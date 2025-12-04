<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('travels', function (Blueprint $table) {

            // DATA MOBIL
            if (!Schema::hasColumn('travels', 'armada')) {
                $table->string('armada')->nullable()->after('kode_travel');
            }

            if (!Schema::hasColumn('travels', 'kursi_tersedia')) {
                $table->integer('kursi_tersedia')->default(0);
            }

            if (!Schema::hasColumn('travels', 'warna')) {
                $table->string('warna')->nullable();
            }

            if (!Schema::hasColumn('travels', 'plat_nomor')) {
                $table->string('plat_nomor')->nullable();
            }

            if (!Schema::hasColumn('travels', 'foto_armada')) {
                $table->string('foto_armada')->nullable();
            }

            if (!Schema::hasColumn('travels', 'jenis_layanan')) {
                $table->enum('jenis_layanan', ['reguler', 'eksekutif', 'eksklusif'])
                    ->default('eksekutif');
            }

            // DATA KONTAK
            if (!Schema::hasColumn('travels', 'whatsapp')) {
                $table->string('whatsapp')->nullable();
            }

            if (!Schema::hasColumn('travels', 'deskripsi')) {
                $table->text('deskripsi')->nullable();
            }

            if (!Schema::hasColumn('travels', 'status')) {
                $table->enum('status', ['aktif', 'nonaktif'])
                    ->default('aktif')
                    ->after('deskripsi');
            }
        });
    }

    public function down(): void
    {
        Schema::table('travels', function (Blueprint $table) {
            // Hapus hanya kalau kolomnya memang ada
            $cols = [
                'armada',
                'kursi_tersedia',
                'warna',
                'plat_nomor',
                'foto_armada',
                'jenis_layanan',
                'whatsapp',
                'deskripsi',
                'status',
            ];

            foreach ($cols as $col) {
                if (Schema::hasColumn('travels', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
