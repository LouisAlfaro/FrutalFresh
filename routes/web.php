<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PromocionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Admin\CartaController;
use App\Http\Controllers\Admin\LocalController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\SliderController;

Route::get('/', function () {
    return view('landing.index');
});

Route::get('/promociones', [LandingController::class, 'promociones'])->name('landing.promociones');
Route::get('/carta', [LandingController::class, 'carta'])->name('landing.carta');
Route::get('/locales', [LandingController::class, 'locales'])->name('landing.locales');
Route::get('/videos', [LandingController::class, 'videos'])->name('landing.videos');

Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::prefix('admin')->group(function () {
    Route::resource('promociones', \App\Http\Controllers\Admin\PromocionController::class);
    Route::resource('carta', CartaController::class);
    Route::resource('locales', LocalController::class);    
    Route::resource('videos', VideoController::class);
    
    Route::resource('sliders', SliderController::class);
    });
    
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
