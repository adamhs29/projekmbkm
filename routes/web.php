<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/success', [App\Http\Controllers\DashboardController::class, 'success'])->name('success');

Route::middleware('role:1')->group(function () {
    // Definisikan route halaman-halaman mahasiswa di sini
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/form', [App\Http\Controllers\FormController::class, 'index'])->name('form');
    Route::post('/form/store', [App\Http\Controllers\FormController::class, 'store']);
    Route::get('/pengumuman', [App\Http\Controllers\FormController::class, 'pengumuman'])->name('pengumuman');

    Route::get('/cetaksuratrekomendasi', [App\Http\Controllers\FormController::class, 'cetaksuratrekomendasi'])->name('cetaksuratrekomendasi');
    Route::get('/cetaksptjm', [App\Http\Controllers\FormController::class, 'cetaksptjm'])->name('cetaksptjm');    
});

Route::middleware('role:2')->group(function () {
    // Definisikan route halaman-halaman prodi di sini
    Route::get('/dashboard-prodi', [App\Http\Controllers\DashboardProdiController::class, 'index'])->name('dashboard-prodi');
    
    Route::get('/data_pendaftarprodi', [App\Http\Controllers\DatapendaftarprodiController::class, 'data_pendaftarprodi'])->name('data_pendaftarprodi');
    Route::get('/detail_dataprodi/{id_pendaftar}', [App\Http\Controllers\DetaildataprodiController::class, 'detail_dataprodi'])->name('admin_prodi.detail_dataprodi');
    Route::put('edit/{id_pendaftar}', [App\Http\Controllers\DetaildataprodiController::class, 'updateStatus'])->name('validasi');

});

Route::middleware('role:3')->group(function () {
    // Definisikan route halaman-halaman pengurus di sini
    Route::get('/dashboard-pengurus', [App\Http\Controllers\DashboardPengurusController::class, 'index'])->name('dashboard-pengurus');

    Route::get('/data_pendaftarpengurus', [App\Http\Controllers\DatapendaftarpengurusController::class, 'data_pendaftarpengurus'])->name('data_pendaftarppengurus');
    Route::get('/detail_datapengurus/{id_pendaftar}', [App\Http\Controllers\DetaildatapengurusController::class, 'detail_datapengurus'])->name('admin_pengurus.detail_datapengurus');
    Route::put('edits/{id_pendaftar}', [App\Http\Controllers\DetaildatapengurusController::class, 'updateStatus'])->name('validasipengurus');
});

Auth::routes();
