<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inputkp;

class InputkpController extends Controller
{
    public function create()
    {
        return view('input');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'bidang_usaha' => 'required|string|max:255',
            'kontak' => 'nullable|string|max:100',
            'telepon' => 'nullable|string|max:20',
        ]);

        Inputkp::create($request->all());

        return redirect()->route('inputkp.create')->with('success', 'Data Tempat KP berhasil disimpan!');
    }
}
