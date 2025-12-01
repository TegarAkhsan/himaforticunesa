<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pengurus_himpunan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswas')->onDelete('cascade');
            $table->enum('jabatan', [
                'Ketua Himpunan',
                'Wakil Himpunan',
                'Sekretaris',
                'Bendahara',
                'Ketua Departemen'
            ]);
            $table->foreignId('departemen_id')->nullable()->constrained('departemen')->onDelete('cascade');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengurus_himpunan');
    }
};
