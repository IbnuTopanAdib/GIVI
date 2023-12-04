<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DonatedItemController;
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
    return view('index');
});

Route::get('/register', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'checklevel:donor', 'prevent-back-history'])->group(function () {
    Route::resource('/donation', DonatedItemController::class);
    Route::get('/donation/create/{category_id}', [DonatedItemController::class, 'create']);
});
