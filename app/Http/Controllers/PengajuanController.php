<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\Surat;



class PengajuanController extends Controller
{
    // Menampilkan form pengajuan
    public function index()
    {
        return view('Pengajuan');
    }

    // Menyimpan data dan generate surat PDF
    public function store(Request $request)
    {
        // Validasi data input
        $data = $request->validate([
            'nama' => 'required|string',
            'npm'=> 'required|string',
            'perusahaan' => 'required|string',
            'alamat' => 'required|string',
            'tanggal_pengajuan' => 'required|date',
        ]);

        // Simpan ke database
        $pengajuan = Pengajuan::create($data);
        return redirect('/pengajuan')->with('success', 'Pengajuan berhasil disimpan!!! Silahkan Tunggu disetujui.');



        // Buat PDF dari view surat
        $pdf = Pdf::loadView('pengajuan.surat', ['pengajuan' => $pengajuan]);

        // Unduh file PDF
        return $pdf->stream('surat_pengajuan.pdf');

    }
///// admin
    public function list()
{
    $data = \App\Models\Pengajuan::orderBy('created_at', 'desc')->get();
    return view('admin/list', compact('data'));
}

public function setujui($id)
{
    $pengajuan = Pengajuan::findOrFail($id);
    $pengajuan->status = 'disetujui';
    $pengajuan->save();

    return redirect()->back()->with('success', 'Pengajuan telah disetujui.');
}



///////tampil data tracking----------

public function userPengajuan()
{
    $user = Auth::user();
    $pengajuan = Pengajuan::where('user_id', $user->id)->latest()->first();

    return view('surat', compact('pengajuan'));
}

///////cetak surat ----

public function cetak($id)
{
    $pengajuan = Pengajuan::findOrFail($id);

    if ($pengajuan->status !== 'disetujui') {
        return redirect()->back()->with('error', 'Surat belum disetujui oleh admin.');
    }

    // 🔽 Cek atau buat surat (agar nomor tidak dobel)
    $surat = Surat::firstOrCreate(
        ['pengajuan_id' => $pengajuan->id],
        [
            'user_id' => auth()->id(),
            'judul' => 'Surat Pengajuan KP',
            'nomor_surat' => (Surat::max('nomor_surat') ?? 0) + 1,
        ]
    );

    $pdf = Pdf::loadView('surat', compact('pengajuan', 'surat'));

    return $pdf->download('surat_pengajuan_' . $pengajuan->npm . '.pdf');
}
}
