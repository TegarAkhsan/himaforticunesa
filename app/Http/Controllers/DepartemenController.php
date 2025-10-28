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
            ->latest('tahun_periode')
            ->first();


        $departemen = Departemen::with([
            'ketua',
            'anggota.mahasiswa',
        ])->get();


        return view('departemen.departemen', compact('periode', 'departemen'));
    }

    public function show($id)
    {
        $departemen = Departemen::with([
            'ketua',
            'anggota.mahasiswa',
        ])->findOrFail($id);

        return view('departemen.show', compact('departemen'));
    }
}
