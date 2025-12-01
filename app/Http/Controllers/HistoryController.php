<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $periodes = \App\Models\Himafortic::with(['ketua', 'wakil'])
            ->orderBy('tahun_periode', 'asc')
            ->get();

        return view('history', compact('periodes'));
    }
}
