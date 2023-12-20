<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataPenerimasController;
use App\Http\Controllers\DataPengembalianController;
use App\Http\Controllers\DataMitraController;
use App\Http\Controllers\DataMitraPengembalianController;
use App\Http\Controllers\Upload;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\DataArsipController;
use App\Http\Controllers\DataSuratController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Controller;


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
Route::get('/', function () {
    return view('home.index');
    
});

Route::get('/kontakperson', function () {
    return view('kontakperson');
});

Route::get('/reg-admin', function () {
    return view('reg-admin');
});

Route::get('/myprofil', function () {
    return view('myprofil');
});

Route::get('/auth.email_template', function () {
    return view('auth.email_template');
});

// Routes for Data Penerima
Route::get('data_penerimas', [DataPenerimasController::class, 'index'])->name('data_penerimas.index');
Route::get('data_penerimas/create', [DataPenerimasController::class, 'create'])->name('data_penerimas.create');
Route::post('data_penerimas/store', [DataPenerimasController::class, 'store'])->name('data_penerimas.store');
Route::get('data_penerimas/edit/{id}', [DataPenerimasController::class, 'edit'])->name('data_penerimas.edit');
Route::post('data_penerimas/update/{id}', [DataPenerimasController::class, 'update'])->name('data_penerimas.update');
Route::post('data_penerimas/delete/{id}', [DataPenerimasController::class, 'destroy'])->name('data_penerimas.destroy');
Route::get('data_penerimas/search', [DataPenerimasController::class, 'search'])->name('data_penerimas.search');
Route::get('data_surat/index/{id}', [DataSuratController::class, 'index'])->name('data_surat.index');
Route::get('data_penerimas/data_penerimas_tabelpdf', [DataPenerimasController::class, 'data_penerima_tabelpdf'])->name('data_penerimas.data_penerima_tabelpdf');
Route::get('data_penerimas/data_penerimas_pdf/{id}', [DataPenerimasController::class, 'data_penerimas_pdf'])->name('data_penerimas.data_penerimas_pdf');
//Route::get('/data_penerimas/{id}', [DataPenerimasController::class, 'index'])->name('data_penerimas.index');


// Routes for Data Pengembalian
Route::get('data_pengembalian', [DataPengembalianController::class, 'index'])->name('data_pengembalian.index');
Route::get('data_pengembalian/edit/{id}', [DataPengembalianController::class, 'edit'])->name('data_pengembalian.edit');
Route::post('data_pengembalian/update/{id}', [DataPengembalianController::class, 'update'])->name('data_pengembalian.update');
Route::post('data_pengembalian/delete/{id}', [DataPengembalianController::class, 'destroy'])->name('data_pengembalian.destroy');
Route::get('data_pengembalian/search', [DataPengembalianController::class, 'search'])->name('data_pengembalian.search');
Route::get('data_pengembalian/data_pengembalian_pdf', [DataPengembalianController::class, 'data_pengembalian_pdf'])->name('data_pengembalian.data_pengembalian_pdf');

// Routes for Data Mitra
Route::get('data_mitra', [DataMitraController::class, 'index'])->name('data_mitra.index');
Route::get('data_mitra/create', [DataMitraController::class, 'create'])->name('data_mitra.create');
Route::post('data_mitra/store', [DataMitraController::class, 'store'])->name('data_mitra.store');
Route::get('data_mitra/edit/{id}', [DataMitraController::class, 'edit'])->name('data_mitra.edit');
Route::post('data_mitra/update/{id}', [DataMitraController::class, 'update'])->name('data_mitra.update');
Route::post('data_mitra/delete/{id}', [DataMitraController::class, 'destroy'])->name('data_mitra.destroy');
Route::get('data_mitra/search', [DataMitraController::class, 'search'])->name('data_mitra.search');
Route::get('data_mitra/data_mitra_tabelpdf', [DataMitraController::class, 'data_mitra_tabelpdf'])->name('data_mitra_tabelpdf');

//Routes for Data Mitra Pengembalian
Route::get('data_mitrapengembalian', [DataMitraPengembalianController::class, 'index'])->name('data_mitrapengembalian.index');
Route::get('data_mitrapengembalian/create', [DataMitraPengembalianController::class, 'create'])->name('data_mitrapengembalian.create');
Route::post('data_mitrapengembalian/store', [DataMitraPengembalianController::class, 'store'])->name('data_mitrapengembalian.store');
Route::get('data_mitrapengembalian/edit/{id}', [DataMitraPengembalianController::class, 'edit'])->name('data_mitrapengembalian.edit');
Route::post('data_mitrapengembalian/update/{id}', [DataMitraPengembalianController::class, 'update'])->name('data_mitrapengembalian.update');
Route::post('data_mitrapengembalian/delete/{id}', [DataMitraPengembalianController::class, 'destroy'])->name('data_mitrapengembalian.destroy');
Route::get('data_mitrapengembalian/search', [DataMitraPengembalianController::class, 'search'])->name('data_mitrapengembalian.search');
Route::get('data_mitrapengembalian/data_mitra_tabel', [DataMitraPengembalianController::class, 'data_mitrapengembalian_tabel'])->name('data_mitrapengembalian_tabel');

Route::get('data_arsip', [DataArsipController::class, 'index'])->name('data_arsip.index');
Route::post('data_arsip', [DataArsipController::class, 'store'])->name('data_arsip.store');
Route::get('data_arsip/create', [DataArsipController::class, 'create'])->name('data_arsip.create');
Route::get('data_arsip/search', [DataArsipController::class, 'search'])->name('data_arsip.search');
Route::get('data_arsip/edit/{id}', [DataArsipController::class, 'edit'])->name('data_arsip.edit');
Route::post('data_arsip/update/{id}', [DataArsipController::class, 'update'])->name('data_arsip.update');
Route::post('data_arsip/delete/{id}', [DataArsipController::class, 'destroy'])->name('data_arsip.destroy');

Route::get('pengembalian/store', [PengembalianController::class, 'store'])->name('pengembalian.store');

Route::middleware(['guest'])->group(function(){
    Route::get('/',[SesiController::class, 'index'])->name('login');
    Route::post('/',[SesiController::class, 'login']); 
});

Route::get('/home', function () {
    return redirect('/admin');
});

Route::get('login', function () {
    return redirect('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/adminn', [AdminController::class, 'adminn'])->middleware('userAkses:adminn');
    Route::get('/pengguna', [AdminController::class, 'pengguna'])->middleware('userAkses:pengguna');
    Route::get('/logout', [SesiController::class, 'logout']);
});

Route::get('data_register', [RegisterController::class, 'index']);
Route::get('data_register/create', [RegisterController::class, 'create'])->name('data_register.create');
Route::get('data_register/add', [RegisterController::class, 'add'])->name('data_register.add');
Route::post('data_register/store', [RegisterController::class, 'store'])->name('data_register.store');
Route::get('data_register/edit', [RegisterController::class, 'edit'])->name('data_register.edit');
Route::post('data_register/update', [RegisterController::class, 'update'])->name('data_register.update');
Route::get('/myprofil', function () {
    return view('myprofil');
});

Route::get('register', [RegisterController::class, 'register']);
Route::post('register', [RegisterController::class, 'store'])->name('register');
Route::get('forget-password', [ForgotPasswordController::class, 'getEmail']);
Route::post('forget-password', [ForgotPasswordController::class, 'postEmail']);

Route::get('reset-password/{token}', [ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [ResetPasswordController::class, 'updatePassword']);