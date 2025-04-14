<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PromocionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Admin\CartaController;
use App\Http\Controllers\Admin\LocalController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\EmpresaController;
use App\Http\Controllers\Admin\ReservationSettingController;
use App\Http\Controllers\Admin\ReservationAdminController;
use App\Http\Controllers\Admin\WorkBenefitController;
use App\Http\Controllers\Admin\WorkApplicationAdminController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\WorkOpportunityController;
use App\Http\Controllers\BusinessOpportunityController;
//
// Rutas Públicas (Landing)
//
Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('/promociones', [LandingController::class, 'promociones'])->name('landing.promociones');
Route::get('/carta', [LandingController::class, 'carta'])->name('landing.carta');
Route::get('/locales', [LandingController::class, 'locales'])->name('landing.locales');
Route::get('/videos', [LandingController::class, 'videos'])->name('landing.videos');
Route::get('/nuestra-empresa', [LandingController::class, 'empresa'])->name('landing.empresa');
Route::get('/reservar', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservar', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/hagamos-negocios', [BusinessOpportunityController::class, 'index'])->name('businessopportunity.index');
Route::post('/hagamos-negocios', [BusinessOpportunityController::class, 'store'])->name('businessopportunity.store');
Route::get('/trabaja-con-nosotros', [WorkOpportunityController::class, 'index'])
    ->name('workopportunity.index');
Route::post('/trabaja-con-nosotros', [WorkOpportunityController::class, 'store'])
    ->name('workopportunity.store');

//
// Rutas de Autenticación
//
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//
// Rutas del Backoffice (Panel de Administración)
// Todas estas rutas están protegidas por el middleware 'auth' y se agrupan bajo el prefijo 'admin'
//
Route::middleware(['auth'])->group(function () {
        Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
    
        Route::prefix('admin')->group(function () {
            // Otros recursos
            Route::resource('promociones', PromocionController::class);
            Route::resource('carta', CartaController::class);
            Route::resource('locales', LocalController::class);
            Route::resource('videos', VideoController::class);
            Route::resource('sliders', SliderController::class);
    
            // Configuración única de Contacto
            Route::get('contact', [ContactController::class, 'edit'])->name('contacts.edit');
            Route::put('contact', [ContactController::class, 'update'])->name('contacts.update');
    
            // Configuración de "Nuestra Empresa" (registro único)
            Route::get('empresa', [EmpresaController::class, 'edit'])->name('empresa.edit');
            Route::put('empresa', [EmpresaController::class, 'update'])->name('empresa.update');
    
            // Configuración de Reservas
            Route::get('reservation-setting', [ReservationSettingController::class, 'edit'])->name('reservationsetting.edit');
            Route::put('reservation-setting', [ReservationSettingController::class, 'update'])->name('reservationsetting.update');
    
            // Administración de Reservas
            Route::get('reservations', [ReservationAdminController::class, 'index'])->name('reservations.admin.index');
            Route::get('reservations/export-csv', [ReservationAdminController::class, 'exportCsv'])->name('reservations.admin.export');
    
            // Recurso para Beneficios de "Trabaja con nosotros" con guion
            Route::resource('work-benefits', WorkBenefitController::class);
            
            // Administración de Postulaciones
            Route::get('work-applications', [WorkApplicationAdminController::class, 'index'])->name('workapplications.index');
            Route::get('work-applications/export-csv', [WorkApplicationAdminController::class, 'exportCsv'])->name('workapplications.export');


            Route::get('business-opportunity-setting', [\App\Http\Controllers\Admin\BusinessOpportunitySettingController::class, 'edit'])
            ->name('businessopportunitysetting.edit');
            Route::put('business-opportunity-setting', [\App\Http\Controllers\Admin\BusinessOpportunitySettingController::class, 'update'])
            ->name('businessopportunitysetting.update');

            Route::get('business-opportunity-applications', [\App\Http\Controllers\Admin\BusinessOpportunityApplicationAdminController::class, 'index'])
            ->name('businessopportunityapplications.index');

            Route::get('business-opportunity-applications/export-csv', [\App\Http\Controllers\Admin\BusinessOpportunityApplicationAdminController::class, 'exportCsv'])
            ->name('businessopportunityapplications.export');
            
            Route::get('social-links', [\App\Http\Controllers\Admin\SocialLinkController::class, 'edit'])
            ->name('sociallinks.edit');
            Route::put('social-links', [\App\Http\Controllers\Admin\SocialLinkController::class, 'update'])
            ->name('sociallinks.update');

            Route::resource('delivery-links', \App\Http\Controllers\Admin\DeliveryLinkController::class);

        });
    });