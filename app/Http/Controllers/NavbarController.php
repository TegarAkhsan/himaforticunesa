<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function index()
    {
        $files = File::latest()->take(10)->get(); // Ambil 10 file terbaru
        return view('layouts.navbar', compact('files'));
    }

    // Untuk download file
    public function download($id)
    {
        $file = File::findOrFail($id);
        return response()->download(storage_path('app/public/' . $file->path), $file->nama_file);
    }
}
