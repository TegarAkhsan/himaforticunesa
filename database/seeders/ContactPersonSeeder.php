<?php

namespace Database\Seeders;

use App\Models\ContactPerson;
use Illuminate\Database\Seeder;

class ContactPersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts = [
            [
                'category' => 'Pengaduan',
                'name' => 'Admin Pengaduan',
                'whatsapp_number' => '6281234567890',
                'is_active' => true,
            ],
            [
                'category' => 'Kerja Sama',
                'name' => 'Admin Kerja Sama',
                'whatsapp_number' => '6281234567891',
                'is_active' => true,
            ],
            [
                'category' => 'Media Partner',
                'name' => 'Admin Media Partner',
                'whatsapp_number' => '6281234567892',
                'is_active' => true,
            ],
        ];

        foreach ($contacts as $contact) {
            ContactPerson::create($contact);
        }
    }
}
