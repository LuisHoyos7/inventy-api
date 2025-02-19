<?php

use App\Http\Controllers\Restify\Auth\ForgotPasswordController;
use App\Http\Controllers\Restify\Auth\LoginController;
use App\Http\Controllers\Restify\Auth\LogoutController;
use App\Http\Controllers\Restify\Auth\RegisterController;
use App\Http\Controllers\Restify\Auth\ResetPasswordController;
use App\Http\Controllers\Restify\Auth\VerifyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Restify auth routes
Route::post('login', LoginController::class)
    ->middleware('throttle:6,1')
    ->name('restify.login');

Route::post('register', RegisterController::class)
    ->name('restify.register');

Route::delete('logout', logoutController::class)
    ->middleware('auth:sanctum')
    ->name('restify.LogoutController');

Route::post('forgotPassword', ForgotPasswordController::class)
    ->middleware('throttle:6,1')
    ->name('restify.forgotPassword');

Route::post('resetPassword', ResetPasswordController::class)
    ->middleware('throttle:6,1')
    ->name('restify.resetPassword');

Route::post('verify/{id}/{hash}', VerifyController::class)
    ->middleware('throttle:6,1')
    ->name('restify.verify');
