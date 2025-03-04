<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\techer\AuthController;

Route::post('/techer/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/techer/logout', [AuthController::class, 'logout']);
    Route::get('/techer/profile', [AuthController::class, 'profile']);
    Route::post('/techer/change/password', [AuthController::class, 'changePassword']);
});