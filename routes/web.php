<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('app')->as('app.')->group(function()
{
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('register', RegisterController::class)->name('register');
});

Route::get('/', HomeController::class)->name('home');

Route::resource('/listing', ListingController::class)->only(['index', 'store', 'show', 'destroy']);
Route::resource('/profile', ProfileController::class)->only(['index']);
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::prefix('auth')->group(function()
{
    Route::get('redirect/{driver}', [LoginController::class, 'handlerRedirect'])->name('login.redirect');
    Route::get('callback/{driver}', [LoginController::class, 'handlerCallback'])->name('login.callback');
});

Route::resource('/reservation', ReservationController::class)->only(['store']);

Route::fallback(function () {
    return redirect()->route('home');
});

Route::get("/forget-password", [ChangePasswordController::class, 'forgetPassword'])->name("forget.password");
Route::post("/forget-password", [ChangePasswordController::class, 'forgetPasswordPost'])->name("forget.password.post");
Route::get("/reset-password/{token}", [ChangePasswordController::class, 'resetPassword'])->name("reset.password");
Route::post("/reset-password", [ChangePasswordController::class, 'resetPasswordPost'])->name("reset.password.post");

Route::get("/update-password", [ChangePasswordController::class, 'updatePassword'])->name("update.password");
Route::post("/update-password", [ChangePasswordController::class, 'updatePasswordPost'])->name("update.password.post");