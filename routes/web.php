<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CompanyStatisticController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\OurPrincipleController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectClientController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\VoucherPackageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/team', [FrontController::class, 'team'])->name('front.team');
Route::get('/product', [FrontController::class, 'product'])->name('front.product');
Route::get('/location', [FrontController::class, 'location'])->name('front.location');
Route::get('/location/{location}', [FrontController::class, 'locationOrder'])->name('front.location_order');
Route::post('/location/{location}/order', [FrontController::class, 'locationOrderContinue'])->name('front.location_order_continue');
Route::post('/location/{location}/confirm-order/{voucher}', [FrontController::class, 'confirmOrderVoucher'])->name('front.confirm_order_voucher');
Route::get('/appointment', [FrontController::class, 'appointment'])->name('front.appointment');
Route::post('/appointment/store', [FrontController::class, 'appointment_store'])->name('front.appointment_store');
Route::post('/order-product', [FrontController::class, 'orderProduct'])->name('front.order_product');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::middleware('can:manage statistics')->group(function () {
            Route::resource('statistics', CompanyStatisticController::class);
        });

        Route::middleware('can:manage products')->group(function () {
            Route::resource('products', ProductController::class);
        });

        Route::middleware('can:manage principles')->group(function () {
            Route::resource('principles', OurPrincipleController::class);
        });

        Route::middleware('can:manage testimonials')->group(function () {
            Route::resource('testimonials', TestimonialController::class);
        });

        Route::middleware('can:manage clients')->group(function () {
            Route::resource('clients', ProjectClientController::class);
        });

        Route::middleware('can:manage teams')->group(function () {
            Route::resource('teams', OurTeamController::class);
        });

        Route::middleware('can:manage abouts')->group(function () {
            Route::resource('abouts', AboutUsController::class);
        });

        Route::middleware('can:manage appointments')->group(function () {
            Route::resource('appointments', AppointmentController::class);
        });

        Route::middleware('can:manage hero sections')->group(function () {
            Route::resource('hero_sections', HeroSectionController::class);
        });

        Route::middleware('can:manage locations')->group(function () {
            Route::resource('locations', LocationController::class);
        });

        // Route::middleware('can:manage voucher packages')->group(function () {
            Route::resource('locations/{location}/voucher_packages', VoucherPackageController::class);
        // });
    });
});

require __DIR__ . '/auth.php';
