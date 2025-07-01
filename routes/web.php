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

// ---------------------- MAIN PAGE ----------------------
Route::get('/', function () {
    return view('authentication/register'); // Main landing page view
});

// ---------------------- LOGIN ----------------------


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

      if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        if (Auth::user()->role === 'admin') {
            return redirect()->route('dashboardAdmin'); // ✅ route name
        } else {
            return redirect()->route('dashboard.mahasiswa'); // ✅ route name
        }
    }

    return back()->with('error', 'Email atau password salah.');
})->name('login.proses');

// ✅ Route user biasa (mahasiswa)
Route::get('/dashboard', function () {
    return view('mahasiswa/index');
})->name('dashboard.mahasiswa')->middleware('mahasiswa');



// ✅ Route admin
Route::get('/admin/dashboard', function () {
    $pengajuans = \App\Models\Pengajuan::orderBy('created_at', 'desc')->get();
    return view('admin/dashboardAdmin', compact('pengajuans'));
})->middleware('admin')->name('dashboardAdmin');





// ---------------------- REGISTER ----------------------
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerProses'])->name('register.proses');

//---------------Logout----------

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// ---------------------- PENGAJUAN KP ----------------------

Route::get('/pengajuan', [PengajuanController::class, 'index']);
Route::post('/pengajuan', [PengajuanController::class, 'store'])->name('pengajuan.store');
Route::post('/pengajuan/{id}/setujui', [PengajuanController::class, 'setujui'])->name('pengajuan.setujui')->middleware('admin');
Route::get('/tracking', [PengajuanController::class, 'userPengajuan'])->name('tracking');


//---------List-------
Route::get('/pengajuan/list', [PengajuanController::class, 'list']);


//-------tracking-------
Route::get('/tracking', function () {
    return view('mahasiswa/tracking');
})->name('tracking');

Route::get('/tracking-result', function (Request $request) {
    $pengajuan = \App\Models\Pengajuan::where('npm', $request->npm)->latest()->first();

    if (!$pengajuan) {
        return redirect()->route('tracking')->with('status', 'Data pengajuan tidak ditemukan.');
    }

    return view('mahasiswa/TrackingResult', compact('pengajuan'));
})->name('tracking.result');

Route::get('/surat-saya', [PengajuanController::class, 'userPengajuan'])->name('pengajuan.user');
Route::get('/pengajuan/{id}/cetak', [PengajuanController::class, 'cetak'])->name('pengajuan.cetak');


