<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\TourController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function()  {
    Route::get('/user',[AuthController::class, 'profile']);
    Route::post('/logout',[AuthController::class, 'logout']);
}); 

Route::post('/signup', [AuthController::class, 'register']);

Route::post('/check-email', [AuthController::class, 'checkEmail']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/most-popular', [HomeController::class, 'index']);

Route::prefix('/tour-list')->group(function () {
    Route::get('/',  [TourController::class, 'index']);
});

Route::get('/booking', [BookingController::class, 'index']);

Route::get('/tour/{slug}', [TourController::class, 'detail']);

