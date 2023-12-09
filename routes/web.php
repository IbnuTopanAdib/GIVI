<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DonatedItemController;
use App\Http\Controllers\DashboardController;
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
Route::middleware(['auth', 'checklevel:admin', 'prevent-back-history'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::patch('/donations/{donation}/approve', [DashboardController::class, 'approveDonation'])
    ->name('donations.approve');
    Route::patch('/donations/{donation}/disapprove', [DashboardController::class, 'disapproveDonation'])
    ->name('donations.disapprove');
    Route::resource('category', CategoryController::class);
});

Route::middleware(['auth', 'checklevel:recipient', 'prevent-back-history'])->group(function () {
    Route::get('/items', [DonatedItemController::class, 'showAllItems']);
    Route::get('/items/{id}', [DonatedItemController::class, 'showItem']);
    Route::get('/categories', [DonatedItemController::class, 'showAllCategory']);
    Route::get('/favorite', [DonatedItemController::class,'showFavorite']);
    Route::post('/item/{id}/favorite/add', [DonatedItemController::class,'addFavorite'])->name('item.favorite.add');;
    Route::delete('/item/{id}/favorite/delete', [DonatedItemController::class,'deleteFavorite'])->name('item.favorite.delete');;
    Route::get('/categories/{category_id}', [DonatedItemController::class, 'showBasedOnCategory']);
    Route::post('/donations', [DonationController::class, 'store'])->name('donations.store');
});
