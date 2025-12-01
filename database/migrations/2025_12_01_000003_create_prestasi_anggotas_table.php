<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('prestasi_anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mahasiswa');
            $table->string('angkatan')->nullable();
            $table->string('foto_mahasiswa')->nullable();
            $table->string('peringkat'); // e.g., Juara 1
            $table->string('judul_kompetisi');
            $table->string('penyelenggara')->nullable();
            $table->date('tanggal')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestasi_anggotas');
    }
};
