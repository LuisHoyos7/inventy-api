<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Restify\Auth\LogoutController;
<<<<<<< HEAD
use App\Http\Controllers\Restify\Auth\RegisterController;
use App\Http\Controllers\Restify\Auth\ResetPasswordController;
use App\Http\Controllers\Restify\Auth\VerifyController;
use App\Http\Controllers\Restify\Auth\ForgotPasswordController;
use App\Http\Controllers\Restify\Auth\LoginController;
=======

use App\Http\Controllers\Restify\Auth\RegisterController;
use App\Http\Controllers\Restify\Auth\ResetPasswordController;
use App\Http\Controllers\Restify\Auth\VerifyController;

>>>>>>> d685549c8810910d0d7216dc6ba1b9abfe5ca031

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

<<<<<<< HEAD
=======


//Route::restifyAuth(actions: ['login', 'register']);
Route::restifyAuth();

//Route::middleware('auth:sanctum')->delete('auth/logout', [LogoutController::class, 'logout']);


Route::delete('LogoutController', \App\Http\Controllers\Restify\Auth\LogoutController::class)
    ->middleware('auth:sanctum')
    ->name('restify.LogoutController');


Route::post('login', \App\Http\Controllers\Restify\Auth\LoginController::class)

>>>>>>> d685549c8810910d0d7216dc6ba1b9abfe5ca031
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
<<<<<<< HEAD
=======


Route::post('verify/{id}/{hash}', \App\Http\Controllers\Restify\Auth\VerifyController::class)
    ->middleware('throttle:6,1')
    ->name('restify.verify');

>>>>>>> d685549c8810910d0d7216dc6ba1b9abfe5ca031
