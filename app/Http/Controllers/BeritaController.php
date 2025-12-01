<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    // 📰 Halaman daftar berita
    public function index(Request $request)
    {
        $selectedKategoriSlug = $request->query('kategori');
        $search = $request->query('search');

        // Ambil semua kategori (tanpa filter tanggal)
        $kategories = KategoriBerita::orderBy('nama')->get();

        // Query utama berita (semua langsung tampil)
        $beritaQuery = Berita::with('kategori')
            ->orderBy('created_at', 'desc');

        // Filter kategori jika dipilih
        if ($selectedKategoriSlug) {
            $beritaQuery->whereHas('kategori', function ($query) use ($selectedKategoriSlug) {
                $query->where('slug', $selectedKategoriSlug);
            });
        }

        // Filter pencarian
        if ($search) {
            $beritaQuery->where('judul', 'ilike', '%' . $search . '%')
                ->orWhere('konten', 'ilike', '%' . $search . '%');
        }

        // Pagination 6 berita per halaman
        $semuaBerita = $beritaQuery->paginate(6)->withQueryString();

        return view('berita.index', [
            'semuaBerita' => $semuaBerita,
            'kategories' => $kategories,
            'selectedKategori' => $selectedKategoriSlug,
            'search' => $search,
        ]);
    }


    public function show(Berita $berita)
    {

        $beritaLain = Berita::where('id', '!=', $berita->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('berita.show', [
            'berita' => $berita,
            'beritaLain' => $beritaLain,
        ]);
    }
}
