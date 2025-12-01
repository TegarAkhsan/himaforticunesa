<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\Departemen;
use App\Models\PengurusHimpunan;

class StrukturOrganisasiSeeder extends Seeder
{
    public function run()
    {
        // 1. Create Mahasiswa (Ketua Departemen)
        $mahasiswas = [
            [
                'nama' => 'Vergi Mutia Rahmasyani',
                'nim' => '21051214001',
                'email' => 'vergi@example.com',
                'jabatan' => 'Ketua Departemen',
                'departemen_nama' => 'AGSOS',
                'departemen_deskripsi' => 'Departemen Agama dan Sosial',
            ],
            [
                'nama' => 'Dickrullah Brilian Akbar',
                'nim' => '21051214002',
                'email' => 'dickrullah@example.com',
                'jabatan' => 'Ketua Departemen',
                'departemen_nama' => 'PENRISTEK',
                'departemen_deskripsi' => 'Departemen Pendidikan, Riset, dan Teknologi',
            ],
            [
                'nama' => 'Fina Fadhilah Maulana',
                'nim' => '21051214003',
                'email' => 'fina@example.com',
                'jabatan' => 'Ketua Departemen',
                'departemen_nama' => 'PSDM',
                'departemen_deskripsi' => 'Departemen Pengembangan Sumber Daya Mahasiswa',
            ],
            [
                'nama' => 'Muhammad Nizar Amirul H.',
                'nim' => '21051214004',
                'email' => 'nizar@example.com',
                'jabatan' => 'Ketua Departemen',
                'departemen_nama' => 'DAGRI',
                'departemen_deskripsi' => 'Departemen Dalam Negeri',
            ],
            [
                'nama' => 'Naufal Rizky Nugroho',
                'nim' => '21051214005',
                'email' => 'naufal@example.com',
                'jabatan' => 'Ketua Departemen',
                'departemen_nama' => 'KOMINFO',
                'departemen_deskripsi' => 'Departemen Komunikasi dan Informasi',
            ],
            [
                'nama' => 'Salzabila Ananda Putri',
                'nim' => '21051214006',
                'email' => 'salzabila@example.com',
                'jabatan' => 'Ketua Departemen',
                'departemen_nama' => 'DEPLU',
                'departemen_deskripsi' => 'Departemen Luar Negeri',
            ],
            [
                'nama' => 'M. Raka Phaedra Agus Putra',
                'nim' => '21051214007',
                'email' => 'raka@example.com',
                'jabatan' => 'Ketua Departemen',
                'departemen_nama' => 'MNB',
                'departemen_deskripsi' => 'Departemen Minat dan Bakat',
            ],
            [
                'nama' => 'Chaterina Fatma Diaksa',
                'nim' => '21051214008',
                'email' => 'chaterina@example.com',
                'jabatan' => 'Ketua Departemen',
                'departemen_nama' => 'EKRAF',
                'departemen_deskripsi' => 'Departemen Ekonomi Kreatif',
            ],
        ];

        foreach ($mahasiswas as $data) {
            // Create Mahasiswa
            $mahasiswa = Mahasiswa::create([
                'nama' => $data['nama'],
                'nim' => $data['nim'],
                'email' => $data['email'],
                'no_hp' => '081234567890', // Dummy
            ]);

            // Create Departemen
            $departemen = Departemen::create([
                'nama' => $data['departemen_nama'],
                'deskripsi' => $data['departemen_deskripsi'],
                'ketua_id' => $mahasiswa->id,
            ]);

            // Create Pengurus Himpunan (Ketua Departemen)
            PengurusHimpunan::create([
                'mahasiswa_id' => $mahasiswa->id,
                'jabatan' => $data['jabatan'],
                'departemen_id' => $departemen->id,
            ]);
        }
    }
}
