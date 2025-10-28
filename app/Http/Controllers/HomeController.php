<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\PengurusHimpunan;

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

        return view('homepage', compact('departemen', 'struktur'));
    }
}
