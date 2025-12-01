<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Himafortic;
use App\Models\Mahasiswa;

class HimaforticSeeder extends Seeder
{
    public function run()
    {
        // Ensure we have some students to assign as leaders
        // If no students exist, create some dummies
        if (Mahasiswa::count() < 10) {
            Mahasiswa::factory()->count(10)->create();
        }

        $students = Mahasiswa::all();

        $historyData = [
            [
                'tahun_periode' => '2021',
                'deskripsi' => 'Periode awal pembentukan fondasi organisasi yang kuat di tengah tantangan pandemi. Fokus pada digitalisasi sistem dan adaptasi program kerja secara daring.',
                'ketua_id' => $students->random()->id,
                'wakil_id' => $students->random()->id,
            ],
            [
                'tahun_periode' => '2022',
                'deskripsi' => 'Membangun sinergi antar angkatan dan memperluas relasi eksternal. Periode ini ditandai dengan banyaknya kolaborasi dengan himpunan mahasiswa dari universitas lain.',
                'ketua_id' => $students->random()->id,
                'wakil_id' => $students->random()->id,
            ],
            [
                'tahun_periode' => '2023',
                'deskripsi' => 'Fokus pada pengembangan prestasi mahasiswa di bidang akademik dan non-akademik. Meluncurkan berbagai pelatihan intensif dan kompetisi internal.',
                'ketua_id' => $students->random()->id,
                'wakil_id' => $students->random()->id,
            ],
            [
                'tahun_periode' => '2024',
                'deskripsi' => 'Transformasi digital menyeluruh dan peningkatan kualitas pengabdian masyarakat. HIMAFORTIC semakin dikenal sebagai organisasi yang inovatif dan berdampak.',
                'ketua_id' => $students->random()->id,
                'wakil_id' => $students->random()->id,
            ],
            [
                'tahun_periode' => '2025',
                'deskripsi' => "Himpunan Mahasiswa Program Studi D4 Manajemen Informatika (HIMAFORTIC) Universitas Negeri Surabaya merupakan organisasi mahasiswa yang berfungsi sebagai wadah aspirasi, pengembangan potensi, serta pembinaan karakter mahasiswa di lingkungan Program Studi D4 Manajemen Informatika. HIMAFORTIC hadir sebagai jembatan antara mahasiswa, program studi, dan institusi dalam menciptakan iklim akademik yang aktif, kreatif, dan produktif. Sebagai organisasi yang berlandaskan nilai-nilai tanggung jawab, profesionalitas, dan solidaritas, HIMAFORTIC berkomitmen untuk menjadi motor penggerak dalam peningkatan mutu akademik dan non-akademik mahasiswa. HIMAFORTIC tidak hanya berperan dalam pengelolaan kegiatan kemahasiswaan, tetapi juga dalam menumbuhkan budaya kolaboratif dan inovatif yang relevan dengan perkembangan teknologi informasi dan dunia industri digital saat ini.\n\nDengan visi untuk mewujudkan Himpunan Mahasiswa Manajemen Informatika sebagai wadah inklusif, adaptif, dan pengemban amanat intelektual yang bertanggung jawab untuk meningkatkan program studi dan institusi, HIMAFORTIC menempatkan diri sebagai organisasi yang terbuka bagi seluruh mahasiswa tanpa memandang latar belakang, dan berperan aktif dalam mendukung kemajuan akademik serta pengembangan kompetensi mahasiswa.\n\nHIMAFORTIC terdiri dari berbagai departemen dan bidang kerja yang memiliki fokus dan tanggung jawab masing-masing, seperti Departemen Penalaran, Riset, dan Teknologi, Departemen Minat dan Bakat, Departemen Luar Negeri, Departemen Dalam Negeri, Departemen Ekonomi Kreatif, Departemen Badan Pengurus Harian, Departemen Agama Sosial, Departemen Pengembangan Sumber Daya Manusia, Departemen Komunikasi dan Informasi. Setiap departemen berperan penting dalam menjalankan program kerja yang berorientasi pada pengembangan diri mahasiswa, peningkatan prestasi, dan perluasan relasi eksternal. Selain itu, HIMAFORTIC juga berperan penting dalam membentuk karakter mahasiswa melalui kegiatan olahraga, kompetisi e-sport, hingga pelatihan kepemimpinan dan organisasi. Dengan semangat “Kolaborasi untuk Inovasi”, HIMAFORTIC berupaya menciptakan lingkungan yang mendukung mahasiswa untuk berpikir kritis, berinovasi, dan berkontribusi nyata bagi masyarakat.\n\nSebagai bagian dari Fakultas Vokasi Universitas Negeri Surabaya, HIMAFORTIC senantiasa berperan aktif dalam mendukung visi universitas untuk menghasilkan lulusan vokasi yang unggul, profesional, dan siap bersaing di dunia kerja maupun wirausaha. Melalui sinergi antara mahasiswa, dosen, dan pihak institusi, HIMAFORTIC berkomitmen untuk terus menjadi organisasi yang progresif, inspiratif, dan berdampak positif, tidak hanya bagi mahasiswa Manajemen Informatika, tetapi juga bagi kemajuan UNESA secara keseluruhan.",
                'ketua_id' => $students->random()->id,
                'wakil_id' => $students->random()->id,
            ],
        ];

        foreach ($historyData as $data) {
            Himafortic::updateOrCreate(
                ['tahun_periode' => $data['tahun_periode']],
                $data
            );
        }
    }
}
