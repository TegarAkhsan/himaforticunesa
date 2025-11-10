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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('nama_file');      // nama file yang ditampilkan ke user
            $table->string('path');           // lokasi penyimpanan file di storage
            $table->string('tipe')->nullable(); // tipe file (pdf, docx, dll)
            $table->unsignedBigInteger('ukuran')->nullable(); // ukuran file (byte)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
