<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DataFotoController;
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
})->name('home');

Route::group(['middleware' => 'guest'], function () {
     /**
         * Register Routes
         */
        Route::get('/register', [RegisterController::class, 'index'])->name('register.show');
        Route::post('/register', [RegisterController::class, 'store'])->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', [LoginController::class, 'index'])->name('login.show');
        Route::post('/login', [LoginController::class, 'store'])->name('login.perform');
});

Route::group(['middleware' => 'auth'], function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/TambahData', 'create')->name('create');
    /**
     * Logout
     */
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    
    /**
     * Profile
     */
    Route::view('/profile', 'profile')->name('profile');
    Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    
    /**
     * Data Foto
     */
    Route::get('data-gambar',  [DataFotoController::class, 'index'])->name('data-foto');
    Route::post('/data-gambar/store', [DataFotoController::class, 'store'])->name('data-gambar.store');
    Route::get('/data-gambar/showdata/{data}', [DataFotoController::class, 'show'])->name('data-foto.show');
    Route::delete('/data-gambar/hapus/{data}', [DataFotoController::class, 'destroy'])->name('data-foto.destroy');
    Route::get('/data-gambar/{filename?}', [DataFotoController::class, 'showGambar'])->name('show.foto');
});