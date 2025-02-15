<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\sadmin\sSettingController;
use App\Http\Controllers\sadmin\sSmsSettingController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');




Route::middleware(['auth', 'sadmin'])->prefix('sadmin')->group(function () {
    Route::get('s/setting', [sSettingController::class, 'index'])->name('sadmin_setting');
    Route::post('s/update/name', [sSettingController::class, 'update_name'])->name('sadmin_update_name');
    Route::post('s/update/status', [sSettingController::class, 'update_status'])->name('sadmin_update_status');
    Route::get('s/sms', [sSmsSettingController::class, 'index'])->name('sadmin_sms');
    Route::post('s/message_status', [sSmsSettingController::class, 'message_status'])->name('sadmin_message_status');
    Route::post('s/message_mavjud', [sSmsSettingController::class, 'message_mavjud'])->name('sadmin_message_mavjud');
});