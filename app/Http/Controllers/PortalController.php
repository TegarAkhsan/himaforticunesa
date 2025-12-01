<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function lomba()
    {
        $lombas = \App\Models\Lomba::where('is_active', true)->latest()->get();
        return view('portal.lomba', compact('lombas'));
    }

    public function prestasi()
    {
        $prestasiOrganisasi = \App\Models\PrestasiOrganisasi::latest('tanggal')->get();
        $prestasiAnggota = \App\Models\PrestasiAnggota::latest('tanggal')->get();
        return view('portal.prestasi', compact('prestasiOrganisasi', 'prestasiAnggota'));
    }
}
