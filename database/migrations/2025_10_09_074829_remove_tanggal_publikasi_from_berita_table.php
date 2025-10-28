<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk menghapus kolom tanggal_publikasi.
     */
    public function up(): void
    {
        Schema::table('berita', function (Blueprint $table) {
            $table->dropColumn('tanggal_publikasi');
        });
    }

    /**
     * Kembalikan perubahan (menambahkan kembali kolom tanggal_publikasi jika di-rollback).
     */
    public function down(): void
    {
        Schema::table('berita', function (Blueprint $table) {
            $table->timestamp('tanggal_publikasi')->nullable();
        });
    }
};
