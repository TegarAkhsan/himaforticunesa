<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;

class ProgramKerjaController extends Controller
{
    /**
     */
    public function index($departemen_id)
    {
        $departemen = Departemen::with('programKerja.fotoProgram')->findOrFail($departemen_id);

        return view('departemen.program_kerja', compact('departemen'));
    }

    /**

     */
    public function show($id)
    {
        $programKerja = ProgramKerja::with('fotoProgram', 'departemen')->findOrFail($id);

        return view('departemen.show_program', compact('programKerja'));
    }
}
