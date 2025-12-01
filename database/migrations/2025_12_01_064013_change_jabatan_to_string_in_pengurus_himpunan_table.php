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
        Schema::table('pengurus_himpunan', function (Blueprint $table) {
            $table->string('jabatan')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengurus_himpunan', function (Blueprint $table) {
            // Reverting to enum is tricky because we might have data that doesn't fit.
            // For now, we just leave it as string or try to revert if possible.
            // But usually down() should revert exactly.
            // Since we are adding 'Staff', reverting to enum without 'Staff' would fail if there is 'Staff' data.
            // So we will just keep it as string in down() or try to revert to enum if we are sure.
            // Ideally, we should list all enum values again.
            $table->enum('jabatan', [
                'Ketua Himpunan',
                'Wakil Himpunan',
                'Sekretaris',
                'Bendahara',
                'Ketua Departemen'
            ])->change();
        });
    }
};
