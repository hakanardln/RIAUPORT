<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('travels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sopir_id')->constrained('users')->onDelete('cascade');
            $table->string('kode_travel')->unique();
            $table->string('rute'); // contoh: "Bengkalis - Dumai"
            $table->string('lokasi_asal');
            $table->string('lokasi_tujuan');
            $table->date('tanggal_berangkat');
            $table->time('jam_berangkat');
            $table->integer('kapasitas_penumpang')->default(0);
            $table->integer('penumpang_terdaftar')->default(0);
            $table->decimal('harga_per_orang', 10, 2)->default(0);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travels');
    }
};
