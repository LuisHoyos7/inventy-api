<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\logoutController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Route::restifyAuth(actions: ['login', 'register']);
Route::restifyAuth();

Route::middleware('auth:sanctum')->delete('auth/logout', [LogoutController::class, 'logout']);
