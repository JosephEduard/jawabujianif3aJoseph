<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PinjamController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/home', [AdminController::class, 'index'])->name('home');

//buku
Route::resource('bukus', BukuController::class);
route::get('/buku', [BukuController::class, 'index'])->name('listbuku');
route::get('/buku/tambah', [BukuController::class, 'tambahbuku'])->name('tambahbuku');
route::post('/buku/store', [BukuController::class, 'storeBuku'])->name('storebuku');
route::get('/buku/edit/{kodebuku}', [BukuController::class, 'editBuku'])->name('editbuku');
route::put('/buku/update/{kodebuku}', [BukuController::class, 'updateBuku'])->name('updatebuku');
route::delete('/buku/delete/{kodebuku}', [BukuController::class, 'destroyBuku'])->name('deletebuku');

//anggota
Route::resource('anggotas', AnggotaController::class);
route::get('/anggota', [AnggotaController::class, 'tampilanggota'])->name('listanggota');
route::get('/anggota/tambah', [AnggotaController::class, 'tambahanggota'])->name('tambahanggota');
route::post('/anggota/store', [AnggotaController::class, 'storeAnggota'])->name('storeanggota');
route::get('/anggota/edit/{idanggota}', [AnggotaController::class, 'editAnggota'])->name('editanggota');
route::put('/anggota/update/{idanggota}', [AnggotaController::class, 'updateAnggota'])->name('updateanggota');
route::delete('/anggota/delete/{idanggota}', [AnggotaController::class, 'destroyAnggota'])->name('deleteanggota');


//pinjam
Route::resource('peminjaman', PinjamController::class);
route::get('/pinjam', [PinjamController::class, 'index'])->name('peminjaman');
route::get('/pinjam/tambah', [PinjamController::class, 'pinjam'])->name('pinjam');
route::post('/pinjam/store', [PinjamController::class, 'storePinjam'])->name('storepinjam');




