<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\{AuthController, CoursController, GroupController};
use App\Http\Controllers\api\user\GroupUserController;
use App\Http\Controllers\api\user\PaymartUserController;
use App\Http\Controllers\api\user\VideoUserController;
use App\Http\Controllers\api\user\TestUserController;
use App\Http\Controllers\api\admin\AuthAdminController;
use App\Http\Controllers\api\admin\HomeAdminController;

Route::post('/v1/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    # AUTH
    Route::post('/v1/logout', [AuthController::class, 'logout']);
    Route::get('/v1/profile', [AuthController::class, 'profile']);
    Route::post('/v1/change-password', [AuthController::class, 'changePassword']);
    # HOME
    Route::get('/v1/groups', [GroupController::class, 'index']);
    Route::get('/v1/group/show/{id}', [GroupController::class, 'show']);
    Route::post('/v1/group/davomad', [GroupController::class, 'davomadPost']);
    # Video Test Audio
    Route::get('/v1/cours/video', [CoursController::class, 'coursVidoe']);
    Route::get('/v1/cours/video/show/{cours_id}', [CoursController::class, 'coursVideoShow']);
    Route::get('/v1/cours/audio', [CoursController::class, 'coursAudio']);
    Route::get('/v1/cours/audio/show/{cours_id}', [CoursController::class, 'coursAudioShow']);
    Route::get('/v1/cours/test', [CoursController::class, 'coursTest']);
    Route::get('/v1/cours/test/show/{group_id}/{cours_id}', [CoursController::class, 'coursTestShow']);
    Route::post('/v1/cours/test/show/post', [CoursController::class, 'TestCheckPost']);
    # To'lovlar Ish haqlari
    
});
/*
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/admin/home', [HomeAdminController::class, 'index']);
    Route::get('/admin/balans', [HomeAdminController::class, 'balans']);
    Route::get('/admin/kassa', [HomeAdminController::class, 'kassa']);
    Route::get('/admin/paymart', [HomeAdminController::class, 'paymart']);
    Route::get('/admin/tashrif', [HomeAdminController::class, 'tashrif']);
    Route::get('/admin/active', [HomeAdminController::class, 'active']);
    Route::get('/admin/debet', [HomeAdminController::class, 'debet']);
    Route::get('/admin/chart_tashrif', [HomeAdminController::class, 'chart_tashrif']);
    Route::get('/admin/chart_paymart', [HomeAdminController::class, 'chart_paymart']);

});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/techer/groups', [GroupsTecherController::class, 'groups']);
    Route::get('/techer/group/{id}', [GroupsTecherController::class, 'group']);
    Route::post('/techer/davomad', [GroupsTecherController::class, 'davomadPost']);
    Route::get('/techer/paymart', [GroupsTecherController::class, 'paymarts']);
    Route::get('/techer/books', [GroupsTecherController::class, 'books']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user/groups', [GroupUserController::class, 'index']);
    Route::get('/user/group/{id}', [GroupUserController::class, 'show']);
    Route::get('/user/paymart', [PaymartUserController::class, 'index']);
    Route::get('/user/video', [VideoUserController::class, 'index']);
    Route::get('/user/video/show/{id}', [VideoUserController::class, 'shows']);
    Route::get('/user/tests', [TestUserController::class, 'index']);
    Route::post('/user/tests/check', [TestUserController::class, 'store']);
});
*/
