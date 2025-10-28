<?php

namespace App\Http\Controllers;

use App\Models\Himafortic;
use Illuminate\Http\Request;

class HimaforticController extends Controller
{
    /**
     * Menampilkan semua periode kepengurusan HIMAFORTIC.
     */
    public function index()
    {
        $periode = Himafortic::with(['ketua', 'wakil'])
            ->orderByDesc('tahun_periode')
            ->get();

        return view('history', compact('periode'));
    }
}
