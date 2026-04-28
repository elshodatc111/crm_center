<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\{AuthController, CoursController, GroupController, PaymentsController};
use App\Http\Controllers\moliya\MoliyaController;

Route::post('/v1/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    # AUTH
    Route::post('/v1/logout', [AuthController::class, 'logout']);
    Route::get('/v1/profile', [AuthController::class, 'profile']);
    Route::post('/v1/change-password', [AuthController::class, 'changePassword']);
    Route::post('/v1/email-update', [AuthController::class, 'changeEmail']);
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
    Route::get('/v1/payment', [PaymentsController::class, 'index']);
    # SUPER ADMIN MOLIYA
    Route::get('/v1/moliya', [MoliyaController::class, 'index_api']);
});

