<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MessageController;
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
    return view('home');
});
Route::middleware(['auth','user-access:USER'])->group(function(){
    Route::resource('survei',SurveiController::class)->name('index','survei');
    Route::post('/survei/proses', [SurveiController::class, 'proses'])->name('survei.proses');
    Route::get('/user/history',[SurveiController::class,'history'])->name('history-user');
    Route::post('/send-message',[MessageController::class,'store'])->name('send');
});


Route::middleware(['auth','user-access:ADMIN'])->group(function () {
    Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('question',PertanyaanController::class)->name('index','question');
    Route::resource('category',KategoriController::class)->name('index','category');
    Route::resource('history',HistoryController::class)->name('index','history');
    Route::resource('message',MessageController::class)->name('index','message');
    Route::get('/message/{id}',[MessageController::class,'show']);

});

require __DIR__.'/auth.php';
