<?php

namespace App\Http\Controllers;

use App\Models\PublicQuestion;
use Illuminate\Http\Request;

class PublicQuestionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|min:5',
            'asker_name' => 'nullable|string|max:255',
        ]);

        PublicQuestion::create([
            'question' => $request->question,
            'asker_name' => $request->asker_name,
            'is_published' => false, // Must be approved by admin
        ]);

        return redirect()->back()->with('success', 'Pertanyaan Anda telah dikirim dan menunggu moderasi admin.');
    }
}
