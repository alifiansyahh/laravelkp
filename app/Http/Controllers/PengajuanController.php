<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PengajuanController extends Controller
{
    /* ===============================
    | USER: Form & Pengajuan Baru
    ================================*/
    public function index()
    {
        return view('Pengajuan');
    }

    public function store(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'nama' => 'required|string',
            'npm' => 'required|string',
            'prodi' => 'required|string',
            'hp' => 'required|string',
            'perusahaan' => 'required|string',
            'alamat' => 'required|string',
            'tanggal_pengajuan' => 'required|date',
        ]);

        // Tambahkan status dan user ID
        $data['status'] = 'menunggu';
        $data['user_id'] = Auth::id();

        // Simpan ke database
        $pengajuan = Pengajuan::create($data);

        return redirect('/pengajuan')->with('success', 'Pengajuan berhasil disimpan! Silakan tunggu disetujui.');
    }

    /* ===============================
    | ADMIN: Tabel & Verifikasi
    ================================*/

    // Menampilkan daftar pengajuan dengan pencarian & pagination
   public function list(Request $request)
{
    $query = Pengajuan::query();

    if ($request->has('search') && $request->search !== '') {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('nama', 'like', "%$search%")
              ->orWhere('npm', 'like', "%$search%");
        });
    }

    // ✅ PASTIKAN gunakan paginate()
    $pengajuans = Pengajuan::orderBy('created_at', 'desc')->paginate(10)->withQueryString();


    return view('dashboardAdmin', compact('pengajuans'));
}


    // Menyetujui pengajuan langsung
    public function setujui($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = 'disetujui';
        $pengajuan->save();

        return redirect()->back()->with('success', 'Pengajuan telah disetujui.');
    }

    // Form verifikasi manual
    public function verifikasi($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('verifikasi', compact('pengajuan'));
    }

    // Simpan hasil verifikasi & buat surat
    public function verifikasiStore(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'required|numeric',
        ]);

        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = 'disetujui';
        $pengajuan->save();

        Surat::create([
            'user_id' => $pengajuan->user_id,
            'pengajuan_id' => $pengajuan->id,
            'judul' => 'Surat Pengajuan KP',
            'nomor_surat' => $request->nomor_surat,
        ]);

        return redirect()->route('dashboardAdmin')->with('success', 'Pengajuan berhasil disetujui dan surat dibuat.');
    }

    /* ===============================
    | USER: Lihat & Cetak Surat
    ================================*/

    // Halaman tracking pengajuan oleh user
    public function userPengajuan()
    {
        $user = Auth::user();
        $pengajuan = Pengajuan::where('user_id', $user->id)->latest()->first();

        return view('surat', compact('pengajuan'));
    }

    // Cetak PDF surat yang sudah disetujui
    public function cetak($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        if ($pengajuan->status !== 'disetujui') {
            return redirect()->back()->with('error', 'Surat belum disetujui oleh admin.');
        }

        // Cek atau buat surat agar tidak dobel nomor
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
