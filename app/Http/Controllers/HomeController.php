<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\PengurusHimpunan;

use App\Models\ContactPerson;
use App\Models\PublicQuestion;

class HomeController extends Controller
{
    public function index()
    {
        $departemen = Departemen::all();
        $pengurus = PengurusHimpunan::with(['mahasiswa', 'departemen'])->get();

        $struktur = [
            'ketua' => $pengurus->firstWhere('jabatan', 'Ketua Himpunan'),
            'wakil' => $pengurus->firstWhere('jabatan', 'Wakil  Himpunan'),
            'sekretaris' => $pengurus->firstWhere('jabatan', 'Sekretaris'),
            'bendahara' => $pengurus->firstWhere('jabatan', 'Bendahara'),
            'ketua_departemen' => $pengurus->where('jabatan', 'Ketua Departemen'),
        ];

        $contactPeople = ContactPerson::where('is_active', true)->get();
        $publicQuestions = PublicQuestion::where('is_published', true)->latest()->get();

        return view('homepage', compact('departemen', 'struktur', 'contactPeople', 'publicQuestions'));
    }
}
