<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataPenerimaController;
use App\Http\Controllers\DataPengembalianController;
use App\Http\Controllers\DataMitraController;


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

Route::get('data_penerima', [DataPenerimaController::class, 'index']);
Route::get('data_penerima/create', [DataPenerimaController::class, 'create'])->name('data_penerima.create');
Route::post('data_penerima/store', [DataPenerimaController::class, 'store'])->name('data_penerima.store');
Route::get('data_penerima/edit/{id}', [DataPenerimaController::class, 'edit'])->name('data_penerima.edit');
Route::post('data_penerima/update/{id}', [DataPenerimaController::class, 'update'])->name('data_penerima.update');
Route::post('data_penerima/delete/{id}', [DataPenerimaController::class, 'destroy'])->name('data_penerima.destroy');
Route::get('data_penerima/search', [DataPenerimaController::class, 'search'])->name('data_penerima.search');
Route::get('data_penerima/data_penerima_pdf/{id}', [DataPenerimaController::class, 'data_penerima_pdf'])->name('data_penerima.data_penerima_pdf');

Route::get('data_pengembalian', 'App\Http\Controllers\DataPengembalianController@index')->name('data_pengembalian.index');
Route::get('data_pengembalian/edit/{id}', 'App\Http\Controllers\DataPengembalianController@edit')->name('data_pengembalian.edit');
Route::post('data_pengembalian/update/{id}', 'App\Http\Controllers\DataPengembalianController@update')->name('data_pengembalian.update');
Route::post('data_pengembalian/delete/{id}', 'App\Http\Controllers\DataPengembalianController@destroy')->name('data_pengembalian.destroy');
Route::get('data_pengembalian/search', 'App\Http\Controllers\DataPengembalianController@search')->name('data_pengembalian.search');
Route::get('data_pengembalian/data_pengembalian_pdf/{id}', 'App\Http\Controllers\DataPengembalianController@data_pengembalian_pdf')->name('data_pengembalian.data_pengembalian_pdf');

Route::get('data_mitra', [DataMitraController::class, 'index']);
Route::put('data_mitra/create', [DataMitraController::class, 'create'])->name('data_mitra.create');
Route::post('data_mitra/store', [DataMitraController::class, 'store'])->name('data_mitra.store');
Route::get('data_mitra/edit/{id}', [DataMitraController::class, 'edit'])->name('data_mitra.edit');
Route::post('data_mitra/update/{id}', [DataMitraController::class, 'update'])->name('data_mitra.update');
Route::post('data_mitra/delete/{id}', [DataMitraController::class, 'destroy'])->name('data_mitra.destroy');
Route::get('data_mitra/search', [DataMitraController::class, 'search'])->name('data_mitra.search');

