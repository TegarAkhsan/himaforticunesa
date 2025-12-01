<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\Departemen;
use App\Models\PengurusHimpunan;

class BPHSeeder extends Seeder
{
    public function run()
    {
        // 1. Create Mahasiswa for BPH
        $bphMembers = [
            [
                'nama' => 'Ketua Himpunan', // Replace with real name if known
                'nim' => '21051214099',
                'email' => 'kahima@example.com',
                'jabatan' => 'Ketua Himpunan',
                'role' => 'Ketua Departemen', // In system context
            ],
            [
                'nama' => 'Wakil Ketua Himpunan',
                'nim' => '21051214098',
                'email' => 'wakahima@example.com',
                'jabatan' => 'Wakil Ketua Himpunan',
                'role' => 'Staff',
            ],
            [
                'nama' => 'Sekretaris 1',
                'nim' => '21051214097',
                'email' => 'sekretaris1@example.com',
                'jabatan' => 'Sekretaris 1',
                'role' => 'Staff',
            ],
            [
                'nama' => 'Sekretaris 2',
                'nim' => '21051214096',
                'email' => 'sekretaris2@example.com',
                'jabatan' => 'Sekretaris 2',
                'role' => 'Staff',
            ],
            [
                'nama' => 'Bendahara 1',
                'nim' => '21051214095',
                'email' => 'bendahara1@example.com',
                'jabatan' => 'Bendahara 1',
                'role' => 'Staff',
            ],
            [
                'nama' => 'Bendahara 2',
                'nim' => '21051214094',
                'email' => 'bendahara2@example.com',
                'jabatan' => 'Bendahara 2',
                'role' => 'Staff',
            ],
        ];

        // 2. Create or Get BPH Department
        $departemen = Departemen::firstOrCreate(
            ['nama' => 'BPH'],
            [
                'deskripsi' => '<p>Badan Pengurus Harian (BPH) adalah pimpinan tertinggi dalam struktur organisasi HIMAFORTIC yang bertanggung jawab atas seluruh koordinasi, kebijakan, dan operasional himpunan. BPH terdiri dari Ketua Himpunan, Wakil Ketua Himpunan, Sekretaris, dan Bendahara.</p>',
            ]
        );

        foreach ($bphMembers as $data) {
            // Create Mahasiswa
            $mahasiswa = Mahasiswa::firstOrCreate(
                ['nim' => $data['nim']],
                [
                    'nama' => $data['nama'],
                    'email' => $data['email'],
                    'no_hp' => '081234567899',
                ]
            );

            // If this is the Ketua Himpunan, update the department's ketua_id
            if ($data['jabatan'] === 'Ketua Himpunan') {
                $departemen->update(['ketua_id' => $mahasiswa->id]);
            }

            // Create Pengurus Himpunan entry
            PengurusHimpunan::firstOrCreate(
                [
                    'mahasiswa_id' => $mahasiswa->id,
                    'departemen_id' => $departemen->id,
                ],
                [
                    'jabatan' => $data['jabatan'], // Use specific title like "Sekretaris 1"
                ]
            );
        }
    }
}
