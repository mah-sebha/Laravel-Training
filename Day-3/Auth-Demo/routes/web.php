<?php

use App\Http\Controllers\GeneralController;
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

Route::get('/', [GeneralController::class, 'index'])->name('home');

Route::get('/register', [GeneralController::class, 'register'])->name('register');

Route::get('/login', [GeneralController::class, 'loginPage'])->name('login');

Route::post('/login', [GeneralController::class, 'login'])->name('do_login');

Route::get('/profile', [GeneralController::class, 'profile'])->name('profile')->middleware('auth');

Route::post('/logout', [GeneralController::class, 'logout'])->name('logout');

