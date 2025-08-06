<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\JadwalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'view']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register-store', [AuthController::class, 'store'])->name('register-store');

Route::middleware(['auth'])->group((function(){
    
    Route::get('dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');
    Route::get('jadwal', [JadwalController::class, 'index'])->name('jadwal');
    Route::get('buat-jadwal', [JadwalController::class, 'create']);
    Route::post('buat-jadwal', [JadwalController::class, 'store'])->name(('buat-jadwal'));
    Route::get('edit-jadwal/{jadwal}', [JadwalController::class, 'edit']);
    Route::put('update-jadwal/{jadwal}', [JadwalController::class, 'update'])->name(('update-jadwal'));
    Route::get('edit-profile/{user:slug}', [AuthController::class, 'editProfile'])->name('edit-profile');
    Route::put('update-profile/{user:slug}', [AuthController::class, 'updateProfile'])->name('update-profile');
    
    Route::get('absen', [AbsenController::class, 'index']);
    Route::get('buat-absen', [AbsenController::class, 'create']);
    Route::post('buat-absen', [AbsenController::class, 'create'])->name('buat-absen');
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
}));