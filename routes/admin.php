<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LayoutController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\Pages\HomeController;
use App\Http\Controllers\Admin\LanguageController;
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

        Route::get('/language/select/', [LanguageController::class, 'selectLanguage'])->name('language.select');
        Route::post('/profile/update', [ProfileController::class, 'store'])->name('profile.update');

        Route::post('/homepage/hero', [HomeController::class, 'index'])->name('homepage.hero');
        Route::post('/homepage/hero/store', [HomeController::class, 'store'])->name('home.hero.store');

        // home header
        Route::get('/header', [LayoutController::class, 'index'])->name('homepage.header');
        Route::post('/header/store', [LayoutController::class, 'store'])->name('home.header.store');

        //about section
        Route::get('/about', [HomeController::class, 'indexAbout'])->name('homepage.about');
        Route::post('/about/store', [HomeController::class, 'storeAbout'])->name('home.about.store');


        // home footer
        Route::get('/footer', [LayoutController::class, 'indexFooter'])->name('homepage.footer');
        Route::post('/footer/store', [LayoutController::class, 'storeFooter'])->name('home.footer.store');



        // language
        Route::get('/language', [LanguageController::class, 'index'])->name('language.home');
        Route::get('/language/edit-language/{lang}', [LanguageController::class, 'getInfo'])->name('language.get.info');
        Route::get('/language/status/{lang}', [LanguageController::class, 'changeStatus'])->name('language.change.status');
        Route::post('/language', [LanguageController::class, 'store'])->name('language.store');
        Route::post('/language/edit-language/', [LanguageController::class, 'update'])->name('language.update');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});
