<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Himafortic;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{

    public function index()
    {

        $periode = Himafortic::with(['ketua', 'wakil'])
            ->where('is_active', true)
            ->first();


        $departemen = Departemen::with([
            'ketua',
            'anggota.mahasiswa',
        ])
            ->where('himafortic_id', $periode?->id)
            ->get();


        return view('departemen.departemen', compact('periode', 'departemen'));
    }

    public function show($slug)
    {
        $departemen = Departemen::with([
            'ketua',
            'anggota.mahasiswa',
        ])->where('slug', $slug)->firstOrFail();

        return view('departemen.show', compact('departemen'));
    }
}
