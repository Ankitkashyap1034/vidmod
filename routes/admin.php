<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\Pages\HomeController;
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

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('admin.dashboard');
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile/update', [ProfileController::class, 'store'])->name('profile.update');
        
        Route::get('/homepage/header', [HomeController::class, 'index'])->name('homepage.header');
        Route::get('/homepage/hero', [HomeController::class, 'index'])->name('homepage.hero');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});
