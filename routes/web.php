<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\User\SurveiController;

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
Route::middleware(['auth','user-access:USER'])->group(function(){
    Route::resource('survei',SurveiController::class)->name('index','survei');
    Route::post('/survei/proses', [SurveiController::class, 'proses'])->name('survei.proses');
    Route::get('/riwayat',[SurveiController::class,'riwayat'])->name('riwayat');
});


Route::middleware(['auth','user-access:ADMIN'])->group(function () {
    Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('pertanyaan',PertanyaanController::class)->name('index','pertanyaan');
    Route::resource('kategori',KategoriController::class)->name('index','kategori');
});

require __DIR__.'/auth.php';
