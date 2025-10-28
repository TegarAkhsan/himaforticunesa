<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('himafortic', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_periode'); // Contoh: 2024/2025
            $table->text('deskripsi')->nullable();
            $table->foreignId('ketua_id')->constrained('mahasiswa')->cascadeOnDelete();
            $table->foreignId('wakil_id')->constrained('mahasiswa')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Balikkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('himafortic');
    }
};
