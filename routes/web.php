<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Client\AboutController;
use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\DestinationController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\TourController;
use App\Http\Controllers\Client\TravelGuideController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::prefix('tour')->group(function() {
    Route::get('/', [TourController::class, 'list'])->name('tour.list');
    Route::get('/detail/{tour}', [TourController::class, 'detail'])->name('tour.detail');
});

Route::prefix('/blog')->group(function() {
    Route::get('/', [BlogController::class, 'list'])->name('blog.list');
    Route::get('/detail', [BlogController::class, 'detail'])->name('blog.detail');
});

Route::prefix('/destination')->group(function() {
    Route::get('/', [DestinationController::class, 'list'])->name('destination.list');
    Route::get('/detail', [DestinationController::class, 'detail'])->name('destination.detail');
});

Route::get('/travel-guide', [TravelGuideController::class, 'list'])->name('travel-guide.list');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'checkLogin'])->name('login.check');
Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signup', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::prefix('admin')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/login', [AdminAuthController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'checkLogin'])->name('admin.checLogin');
});
