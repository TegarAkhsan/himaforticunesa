<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Drop the check constraint if it exists
        // This is specific to PostgreSQL
        if (DB::getDriverName() === 'pgsql') {
            DB::statement('ALTER TABLE pengurus_himpunan DROP CONSTRAINT IF EXISTS pengurus_himpunan_jabatan_check');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // We don't need to restore the constraint as we want it to be a string
    }
};
