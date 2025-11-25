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
        Schema::table('travels', function (Blueprint $table) {
            // === MOBIL ===
            $table->string('armada')->nullable()->after('keterangan');
            $table->string('warna')->nullable()->after('armada');
            $table->string('plat_nomor')->nullable()->after('warna');
            $table->integer('kursi_tersedia')->nullable()->after('kapasitas_penumpang');

            // layanan: reguler / eksekutif / eksklusif
            $table->string('jenis_layanan')->nullable()->after('plat_nomor');

            // foto armada
            $table->string('foto_armada')->nullable()->after('jenis_layanan');

            // === RUTE ===
            $table->string('titik_jemput')->nullable()->after('lokasi_asal');
            $table->string('titik_turun')->nullable()->after('lokasi_tujuan');
            $table->string('estimasi_waktu')->nullable()->after('jam_berangkat');

            // === KONTAK ===
            $table->string('whatsapp')->nullable()->after('harga_per_orang');
            $table->text('deskripsi')->nullable()->after('whatsapp');

            // status travel
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif')->after('deskripsi');
        });
    }

    public function down(): void
    {
        Schema::table('travels', function (Blueprint $table) {
            $table->dropColumn([
                'armada',
                'warna',
                'plat_nomor',
                'kursi_tersedia',
                'jenis_layanan',
                'foto_armada',
                'titik_jemput',
                'titik_turun',
                'estimasi_waktu',
                'whatsapp',
                'deskripsi',
                'status',
            ]);
        });
    }
};
