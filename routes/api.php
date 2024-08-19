<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Restify\Auth\LogoutController;
use App\Restify\BrancheRepository;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Restify::repositories([
    BrancheRepository::class,
]);

//Route::restifyAuth(actions: ['login', 'register']);
Route::restifyAuth();

//Route::middleware('auth:sanctum')->delete('auth/logout', [LogoutController::class, 'logout']);

Route::delete('LogoutController', \App\Http\Controllers\Restify\Auth\LogoutController::class)
    ->middleware('auth:sanctum')
    ->name('restify.LogoutController');


