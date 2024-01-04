<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/profile', 'profile')->name('profile');
    Route::view('/data-gambar', 'data-foto')->name('data-foto');
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

        /**
         * Logout
         */
        Route::match(['get', 'post'], '/logout', [LoginController::class, 'logout'])->name('logout');

});
