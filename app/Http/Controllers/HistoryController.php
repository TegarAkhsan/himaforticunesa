<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $periodes = \App\Models\Himafortic::with([
            'ketua',
            'wakil',
            'departemen.anggota.mahasiswa',
            'departemen.programKerja.fotoProgram',
            'galleries'
        ])
            ->orderBy('tahun_periode', 'asc')
            ->get();

        return view('history', compact('periodes'));
    }

    public function debug()
    {
        return \App\Models\Himafortic::with([
            'ketua',
            'wakil',
            'departemen.anggota.mahasiswa',
        ])
            ->orderBy('tahun_periode', 'asc')
            ->get();
    }
}
