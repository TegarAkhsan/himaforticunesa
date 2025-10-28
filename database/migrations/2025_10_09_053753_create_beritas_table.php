<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\KategoriBerita;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(KategoriBerita::class)->constrained()->cascadeOnDelete();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('gambar_utama')->nullable();
            $table->longText('konten');
            $table->string('penulis');
            $table->timestamp('tanggal_publikasi')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
