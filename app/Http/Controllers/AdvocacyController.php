<?php

namespace App\Http\Controllers;

use App\Models\Advocacy;
use Illuminate\Http\Request;

class AdvocacyController extends Controller
{
    public function index()
    {
        return view('advokasi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|min:10',
        ]);

        Advocacy::create([
            'message' => $request->message,
            'status' => 'New',
        ]);

        return redirect()->route('advokasi.index')->with('success', 'Pesan Anda telah terkirim secara anonim. Terima kasih atas masukan Anda!');
    }
}
