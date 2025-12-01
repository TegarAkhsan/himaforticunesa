<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departemen;
use App\Models\ProgramKerja;
use App\Models\FotoProgramKerja;
use Carbon\Carbon;

class ProgramKerjaSeeder extends Seeder
{
    public function run()
    {
        $departemens = Departemen::all();

        if ($departemens->isEmpty()) {
            return;
        }

        foreach ($departemens as $departemen) {
            // Create 2 programs for each department
            for ($i = 1; $i <= 2; $i++) {
                $program = ProgramKerja::create([
                    'departemen_id' => $departemen->id,
                    'nama' => "Program Kerja {$i} - {$departemen->nama}",
                    'deskripsi' => "<p>Ini adalah deskripsi untuk Program Kerja {$i} dari departemen {$departemen->nama}. Program ini bertujuan untuk meningkatkan kualitas mahasiswa di bidang terkait.</p>",
                    'tanggal_mulai' => Carbon::now()->addDays($i * 10),
                    'tanggal_selesai' => Carbon::now()->addDays($i * 10 + 5),
                ]);

                // Add dummy photos
                FotoProgramKerja::create([
                    'program_kerja_id' => $program->id,
                    'foto1' => null, // User can upload real photos later
                    'foto2' => null,
                    'foto3' => null,
                ]);
            }
        }
    }
}
