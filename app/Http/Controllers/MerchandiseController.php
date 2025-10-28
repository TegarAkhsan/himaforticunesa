<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Merchandise;
use App\Models\KategoriMerchandise; 

class MerchandiseController extends Controller
{

    public function index(Request $request) 
    {

        $kategories = KategoriMerchandise::orderBy('nama')->get();

        $selectedKategori = $request->query('kategori');

        $query = Merchandise::latest();

        if ($selectedKategori) {
            $query->whereHas('kategori', function ($subQuery) use ($selectedKategori) {
                $subQuery->where('nama', $selectedKategori);
            });
        }

        $merchandises = $query->paginate(4)->withQueryString();

        return view('merchandise', [
            'merchandises' => $merchandises,
            'kategories' => $kategories,
            'selectedKategori' => $selectedKategori,
        ]);
    }
}