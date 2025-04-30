<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\techer\AuthController;
use App\Http\Controllers\api\techer\GroupsTecherController;
use App\Http\Controllers\api\user\AuthUserController;
use App\Http\Controllers\api\user\GroupUserController;
use App\Http\Controllers\api\user\PaymartUserController;
use App\Http\Controllers\api\user\VideoUserController;
use App\Http\Controllers\api\user\TestUserController;
use App\Http\Controllers\api\user\AuthAdminController;


Route::post('/techer/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/techer/logout', [AuthController::class, 'logout']);
    Route::get('/techer/profile', [AuthController::class, 'profile']);
    Route::post('/techer/change/password', [AuthController::class, 'changePassword']);
    Route::get('/techer/groups', [GroupsTecherController::class, 'groups']);
    Route::get('/techer/group/{id}', [GroupsTecherController::class, 'group']);
    Route::post('/techer/davomad', [GroupsTecherController::class, 'davomadPost']);
    Route::get('/techer/paymart', [GroupsTecherController::class, 'paymarts']);
    Route::get('/techer/books', [GroupsTecherController::class, 'books']);
}); 

Route::post('/user/login', [AuthUserController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/user/logout', [AuthUserController::class, 'logout']);
    Route::get('/user/profile', [AuthUserController::class, 'profile']);
    Route::post('/user/change/password', [AuthUserController::class, 'changePassword']);
    Route::get('/user/groups', [GroupUserController::class, 'index']);
    Route::get('/user/group/{id}', [GroupUserController::class, 'show']);
    Route::get('/user/paymart', [PaymartUserController::class, 'index']);
    Route::get('/user/video', [VideoUserController::class, 'index']);
    Route::get('/user/video/show/{id}', [VideoUserController::class, 'shows']);
    Route::get('/user/tests', [TestUserController::class, 'index']);
    Route::post('/user/tests/check', [TestUserController::class, 'store']);
}); 

Route::post('/admin/login', [AuthAdminController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/admin/logout', [AuthAdminController::class, 'logout']);
    Route::get('/admin/profile', [AuthAdminController::class, 'profile']);
    Route::post('/admin/change/password', [AuthAdminController::class, 'changePassword']);
    
}); 