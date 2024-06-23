<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    RekeningController,
    TipeKamarController,
    KamarController,
    RumahKosController,
    FasilitasKosController,
    PenghuniKosController,
    PengelolaController,
    LoginController,
    PembayaranController
};



Route::get('/', function () {
    return redirect()->route('login.index');
});

Route::middleware(['auth:web,pengelola,penghuni'])->group(function () {
    Route::resource('rekening', RekeningController::class);
    Route::resource('tipe_kamar', TipeKamarController::class);
    Route::resource('kamar', KamarController::class);
    Route::resource('rumah_kos', RumahKosController::class);
    Route::resource('fasilitas_kos', FasilitasKosController::class);
    Route::resource('pengelola', PengelolaController::class);
    Route::resource('pembayaran', PembayaranController::class);
    Route::resource('penghuni_kos', PenghuniKosController::class);
});


Route::middleware(['auth:penghuni'])->group(function () {
    Route::get('profil/penghuni_kos/{id}', [PenghuniKosController::class, 'profilPenghuni'])->name('profil.penghuni');
    Route::get('riwayat/penghuni_kos/{id}', [PenghuniKosController::class, 'riwayatPembayaranPenghuni'])->name('riwayat.penghuni');
});


//login user & superadmin
Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::post('login', [LoginController::class, 'post'])->name('login.post');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//login user pengelola
Route::get('login-pengelola', [LoginController::class, 'indexPengelola'])->name('login.pengelola');
Route::post('login-pengelola', [LoginController::class, 'postPengelola'])->name('login-pengelola.post');
Route::get('register-pengelola', [LoginController::class, 'registerPengelola'])->name('register.pengelola');
Route::post('register-pengelola', [LoginController::class, 'storeRegisterPengelola'])->name('register-pengelola.post');
Route::get('register-user', [LoginController::class, 'registerUser'])->name('register.user');
Route::post('register-user', [LoginController::class, 'storeRegisterUser'])->name('register-user.post');
