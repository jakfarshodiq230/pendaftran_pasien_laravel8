<?php

use Illuminate\Support\Facades\Route;

// controler
use App\Http\Controllers\C_Home;
use App\Http\Controllers\C_MasterData;
use App\Http\Controllers\C_Pasien;
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
    return view('welcome');
});

Route::get('/home', [C_Home::class, 'home'])->name('home');
Route::get('/data-master', [C_MasterData::class, 'index'])->name('data.master');
// regestrasi
Route::get('/data-master/data', [C_MasterData::class, 'dataRegistrasi'])->name('data.registrasi');
Route::post('/data-master/resgistrasi/save', [C_MasterData::class, 'createRegistrasi'])->name('registrasi.save');
Route::get('/data-master/resgistrasi/edit/{id}', [C_MasterData::class, 'editRegistrasi'])->name('registrasi.edit');
Route::post('/data-master/resgistrasi/update', [C_MasterData::class, 'updateRegistrasi'])->name('registrasi.simpanEdit');
Route::get('/data-master/resgistrasi/delete/{id}', [C_MasterData::class, 'deleteRegistrasi'])->name('registrasi.delete');
// pelayanan
Route::get('/data-master/data/pelayanan', [C_MasterData::class, 'dataPelayanan'])->name('data.pelayanan');
Route::post('/data-master/pelayanan/save', [C_MasterData::class, 'createPelayanan'])->name('pelayanan.save');
Route::get('/data-master/pelayanan/edit/{id}', [C_MasterData::class, 'editPelayanan'])->name('pelayanan.edit');
Route::post('/data-master/pelayanan/update', [C_MasterData::class, 'updatePelayanan'])->name('pelayanan.simpanEdit');
Route::get('/data-master/pelayanan/delete/{id}', [C_MasterData::class, 'deletePelayanan'])->name('pelayanan.delete');

// pembiyaan
Route::get('/data-master/data/pembiyaan', [C_MasterData::class, 'dataPembiyaan'])->name('data.pembiyaan');
Route::post('/data-master/pembiyaan/save', [C_MasterData::class, 'createPembiyaan'])->name('pembiyaan.save');
Route::get('/data-master/pembiyaan/edit/{id}', [C_MasterData::class, 'editPembiyaan'])->name('pembiyaan.edit');
Route::post('/data-master/pembiyaan/update', [C_MasterData::class, 'updatePembiyaan'])->name('pembiyaan.simpanEdit');
Route::get('/data-master/pembiyaan/delete/{id}', [C_MasterData::class, 'deletePembiyaan'])->name('pembiyaan.delete');

Route::get('/data-pasien', [C_Pasien::class, 'index'])->name('pasien.dataPasien');
Route::get('/data-pasien/daftar', [C_Pasien::class, 'daftarPasien'])->name('pasien.daftar');
Route::post('/data-pasien/save', [C_Pasien::class, 'createPasien'])->name('pasien.save');
Route::get('/data-pasien/edit/{id}', [C_Pasien::class, 'editPasien'])->name('pasien.edit');
Route::post('/data-pasien/update', [C_Pasien::class, 'updatePasien'])->name('pasien.update');
Route::get('/data-pasien/delete/{id}', [C_Pasien::class, 'deletePasien'])->name('pasien.delete');
Route::get('/data-pasien/selesai/{id}', [C_Pasien::class, 'selesaiPasien'])->name('pasien.selesai');

