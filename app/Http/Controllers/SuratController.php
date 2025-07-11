<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
        ]);

        $lastNumber = Surat::max('nomor_surat') ?? 0;

        $surat = new Surat();
        $surat->user_id = auth()->id();
        $surat->judul = $request->judul;
        $surat->nomor_surat = $lastNumber + 1;
        $surat->save();

        return redirect()->route('surat.show', $surat->id)
                         ->with('success', 'Surat berhasil dibuat.');
    }

   public function show($id)
{
    $surat = Surat::findOrFail($id);
    return view('surat', compact('surat'));
}

}
