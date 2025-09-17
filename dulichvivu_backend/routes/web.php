<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartureController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\TimelineController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Payment\MomoController;
use App\Http\Controllers\Payment\PaypalController;
use App\Http\Middleware\Login;
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

Route::get('/verify/{user}', [UserController::class, 'verify'])->name('email.verify');

Route::get('/', [DashboardController::class, 'index'])->middleware([Login::class])->name('dashboard');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'checkLogin'])->name('checkLogin');

Route::prefix('/booking')->group(function () {
    Route::get('/momo', [MomoController::class, 'momoConfirm'])->name('momo');
    Route::get('/paypal', [PaypalController::class, 'confirm'])->name('paypal');
});

Route::middleware('auth:admin')->group(function () {
    Route::prefix('/profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile');
        Route::put('/update/{admin}', [ProfileController::class, 'update'])->name('profile.update');
    });

    Route::prefix('/user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.list');
        Route::put('/status/{user}', [UserController::class, 'status'])->name('user.status');
    });
    Route::prefix('/tour')->group(function () {
        Route::get('/', [TourController::class, 'index'])->name('tour.list');
        Route::get('/create', [TourController::class, 'create'])->name('tour.create');
        Route::post('/store', [TourController::class, 'store'])->name('tour.store');
        Route::get('/edit/{slug}', [TourController::class, 'edit'])->name('tour.edit');
        Route::put('/update/{tour}', [TourController::class, 'update'])->name('tour.update');
        Route::delete('/delete/{tour}', [TourController::class,  'destroy'])->name('tour.delete');
        Route::put('/open/{tour}', [TourController::class, 'open'])->name('tour.open');

        Route::prefix('/{tour}/departure')->group(function() {
            Route::get('/', [DepartureController::class, 'index'])->name('departure.list');
            Route::get('/create', [DepartureController::class, 'create'])->name('departure.create');
            Route::post('/create', [DepartureController::class, 'store'])->name('departure.store');
            Route::get('/edit/{departure}', [DepartureController::class, 'edit'])->name('departure.edit');
            Route::put('/update/{departure}', [DepartureController::class, 'update'])->name('departure.update');
            Route::put('/status/{departure}', [DepartureController::class, 'status'])->name('departure.status');
            Route::delete('/delete/{departure}', [DepartureController::class, 'destroy'])->name('departure.destroy');
        });

        Route::prefix('/{tour}/image')->group(function () {
            Route::get('/create', [ImageController::class, 'create'])->name('image.create');
            Route::post('/store', [ImageController::class, 'store'])->name('image.store');
            Route::get('/edit', [ImageController::class, 'edit'])->name('image.edit');
            Route::post('/update', [ImageController::class, 'update'])->name('image.update');
        });

        Route::prefix('/{tour}/timeline')->group(function () {
            Route::get('/', [TimelineController::class, 'create'])->name('timeline.create');
            Route::post('/store', [TimelineController::class, 'store'])->name('timeline.store');
            Route::get('/edit', [TimelineController::class, 'edit'])->name('timeline.edit');
            Route::put('/update', [TimelineController::class, 'update'])->name('timeline.update');
            Route::delete('/delete', [TimelineController::class, 'destroy'])->name('timeline.delete');
        });
    });

    Route::prefix('/booking')->group(function () {
        Route::get('/', [BookingController::class, 'index'])->name('booking.list');
        Route::get('/{booking}', [BookingController::class, 'detail'])->name('booking.detail');
        Route::put('/update/{booking}', [BookingController::class, 'update'])->name('booking.update');
    });

    Route::put('/refund/{booking}', [BookingController::class, 'refund'])->name('booking.refund');

    Route::get('/logout', [AuthController::class, 'logout'])->middleware([Login::class])->name('logout');
});
