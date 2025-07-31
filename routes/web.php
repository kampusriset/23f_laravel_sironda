<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [AuthController::class, 'view']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store'])->name('register');

Route::middleware(['auth'])->group((function(){
    
    Route::get('edit-profile/{user:slug}', [AuthController::class, 'editProfile'])->name('edit-profile');
    Route::put('update-profile/{user:slug}', [AuthController::class, 'updateProfile'])->name('update-profile');

    Route::get('/absen', [AbsenController::class, 'index']);
    
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
}));