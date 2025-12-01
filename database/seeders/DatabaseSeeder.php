<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            StrukturOrganisasiSeeder::class,
            HimaforticSeeder::class,
            ProgramKerjaSeeder::class,
            BPHSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Admin Hima',
            'email' => 'admin@himafortic.com',
            'password' => bcrypt('password'),
        ]);
    }
}
