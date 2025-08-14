<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengajuan;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuratController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ---------------------- MAIN LANDING ----------------------
Route::get('/', fn () => view('Index'));

// ---------------------- AUTH ----------------------

// Login
Route::get('/login', fn () => view('login'))->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password', 'role');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return Auth::user()->role === 'admin'
            ? redirect()->route('dashboardAdmin')
            : redirect()->route('dashboard.mahasiswa');
    }

    return back()->with('error', 'Email atau password salah.');
})->name('login.proses');

// Register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerProses'])->name('register.proses');

// Logout
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// ---------------------- DASHBOARD ----------------------

// Mahasiswa
Route::get('/dashboard', fn () => view('index'))->name('dashboard.mahasiswa')->middleware('mahasiswa');

// Admin
Route::get('/admin/dashboard', function () {
    $pengajuans = Pengajuan::orderBy('created_at', 'desc')->paginate(10)->withQueryString(); // ✅ BENAR
    return view('dashboardAdmin', compact('pengajuans'));
})->middleware('admin')->name('dashboardAdmin');

// ---------------------- ADMIN: USER MANAGEMENT ----------------------

// ---------------------- PENGAJUAN KP ----------------------

// Mahasiswa pengajuan
Route::get('/pengajuan', [PengajuanController::class, 'index']);
Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');

// Tracking
Route::get('/tracking', fn () => view('tracking'))->name('tracking');
Route::get('/tracking-result', function (Request $request) {
    $pengajuan = Pengajuan::where('npm', $request->npm)->latest()->first();

    if (!$pengajuan) {
        return redirect()->route('tracking')->with('status', 'Data pengajuan tidak ditemukan.');
    }

    return view('TrackingResult', compact('pengajuan'));
})->name('tracking.result');

// Surat saya
Route::get('/surat-saya', [PengajuanController::class, 'userPengajuan'])->name('pengajuan.user');
Route::get('/pengajuan/{id}/cetak', [PengajuanController::class, 'cetak'])->name('pengajuan.cetak');

// ---------------------- ADMIN: PENGAJUAN ----------------------

// List pengajuan
Route::get('/admin/pengajuan', [PengajuanController::class, 'list'])->name('pengajuan.list');

// Verifikasi pengajuan
Route::get('/pengajuan/verifikasi/{id}', [PengajuanController::class, 'verifikasi'])->name('pengajuan.verifikasi');
Route::post('/pengajuan/verifikasi/{id}', [PengajuanController::class, 'verifikasiStore'])->name('pengajuan.verifikasi.store');

// Setujui langsung (tanpa form)
Route::post('/pengajuan/{id}/setujui', [PengajuanController::class, 'setujui'])->name('pengajuan.setujui')->middleware('admin');

// ---------------------- SURAT ----------------------
Route::post('/surat', [SuratController::class, 'store'])->name('surat.store');
Route::get('/surat/{id}', [SuratController::class, 'show'])->name('surat');

// Input Tempat KP
use App\Http\Controllers\inputkpController;

Route::get('/input', [inputkpController::class, 'create'])->name('inputkp.create');
Route::post('/input', [inputkpController::class, 'store'])->name('inputkp.store');
