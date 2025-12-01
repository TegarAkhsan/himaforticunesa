<?php

namespace Database\Seeders;

use App\Models\Departemen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UpdateDepartemenSlugsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departemens = Departemen::all();

        foreach ($departemens as $departemen) {
            $departemen->slug = Str::slug($departemen->nama);
            $departemen->save();
        }
    }
}
