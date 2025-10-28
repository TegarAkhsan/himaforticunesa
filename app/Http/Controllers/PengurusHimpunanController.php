<?php

namespace App\Http\Controllers;

use App\Models\PengurusHimpunan;
use App\Models\Departemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengurusHimpunanController extends Controller
{
    public function index()
    {
        $departemen = Departemen::all();

            $struktur = [
                'ketua' => PengurusHimpunan::with('mahasiswa')
                    ->where('jabatan', 'Ketua Himpunan')
                    ->first(),

                'wakil' => PengurusHimpunan::with('mahasiswa')
                    ->where('jabatan', 'Wakil Ketua Himpunan')
                    ->first(),

                'sekretaris' => PengurusHimpunan::with('mahasiswa')
                    ->where('jabatan', 'Sekretaris')
                    ->first(),

                'bendahara' => PengurusHimpunan::with('mahasiswa')
                    ->where('jabatan', 'Bendahara')
                    ->first(),

                'ketua_departemen' => PengurusHimpunan::with(['mahasiswa', 'departemen'])
                    ->where('jabatan', 'Ketua Departemen')
                    ->get(),
            ];

        return view('homepage', compact('struktur', 'departemen'));
    }
}