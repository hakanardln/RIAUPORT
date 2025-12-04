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
            // ====== FIELD MOBIL ======
            if (!Schema::hasColumn('travels', 'armada')) {
                $table->string('armada')->nullable()->after('kode_travel');
            }

            if (!Schema::hasColumn('travels', 'warna')) {
                $table->string('warna')->nullable()->after('armada');
            }

            if (!Schema::hasColumn('travels', 'plat_nomor')) {
                $table->string('plat_nomor')->nullable()->after('warna');
            }

            if (!Schema::hasColumn('travels', 'foto_armada')) {
                $table->string('foto_armada')->nullable()->after('plat_nomor');
            }

            if (!Schema::hasColumn('travels', 'jenis_layanan')) {
                $table->string('jenis_layanan')->nullable()->after('foto_armada'); // Reguler/Eksekutif/Eksklusif
            }

            // ====== KONTAK & INFO TAMBAHAN ======
            if (!Schema::hasColumn('travels', 'whatsapp')) {
                $table->string('whatsapp')->nullable()->after('harga_per_orang');
            }

            if (!Schema::hasColumn('travels', 'deskripsi')) {
                $table->text('deskripsi')->nullable()->after('keterangan');
            }

            if (!Schema::hasColumn('travels', 'status')) {
                $table->boolean('status')->default(1)->after('deskripsi'); // 1 = aktif, 0 = nonaktif
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('travels', function (Blueprint $table) {
            // Hapus kolom-kolom yang ditambah di up()
            $cols = ['armada', 'warna', 'plat_nomor', 'foto_armada', 'jenis_layanan', 'whatsapp', 'deskripsi', 'status'];

            foreach ($cols as $col) {
                if (Schema::hasColumn('travels', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};