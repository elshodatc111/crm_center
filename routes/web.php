<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\sadmin\sSettingController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');




Route::middleware(['auth', 'sadmin'])->prefix('sadmin')->group(function () {
    Route::get('setting', [sSettingController::class, 'index'])->name('sadmin_setting');
    Route::post('update/name', [sSettingController::class, 'update_name'])->name('sadmin_update_name');
    Route::post('update/status', [sSettingController::class, 'update_status'])->name('sadmin_update_status');
});