<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Departemen;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();
        $departemens = Departemen::all();

        return response()->view('sitemap.index', [
            'beritas' => $beritas,
            'departemens' => $departemens,
        ])->header('Content-Type', 'text/xml');
    }
}
