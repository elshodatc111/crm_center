<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\techer\AuthController;
use App\Http\Controllers\api\techer\GroupsTecherController;


Route::post('/techer/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/techer/logout', [AuthController::class, 'logout']);
    Route::get('/techer/profile', [AuthController::class, 'profile']);
    Route::post('/techer/change/password', [AuthController::class, 'changePassword']);
    
    Route::get('/techer/groups', [GroupsTecherController::class, 'groups']);
    Route::get('/techer/group/{id}', [GroupsTecherController::class, 'group']);
    
}); 