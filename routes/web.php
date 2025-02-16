<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\sadmin\sSettingController;
use App\Http\Controllers\sadmin\sSmsSettingController;
use App\Http\Controllers\sadmin\sTimeController;
use App\Http\Controllers\admin\setting\HolidayController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');




Route::middleware(['auth', 'sadmin'])->prefix('sadmin')->group(function () {
    Route::get('s/setting', [sSettingController::class, 'index'])->name('sadmin_setting');
    Route::post('s/update/name', [sSettingController::class, 'update_name'])->name('sadmin_update_name');
    Route::post('s/update/status', [sSettingController::class, 'update_status'])->name('sadmin_update_status');
    Route::get('s/sms', [sSmsSettingController::class, 'index'])->name('sadmin_sms');
    Route::post('s/message_status', [sSmsSettingController::class, 'message_status'])->name('sadmin_message_status');
    Route::post('s/message_mavjud', [sSmsSettingController::class, 'message_mavjud'])->name('sadmin_message_mavjud');
    
    Route::get('s/time', [sTimeController::class, 'index'])->name('sadmin_time');
    Route::post('s/time/story', [sTimeController::class, 'store'])->name('sadmin_time_store');
    Route::post('s/time/delete', [sTimeController::class, 'delete'])->name('sadmin_time_delete');
});

Route::middleware(['auth', 'sadmin'])->prefix('sadmin')->group(function () {
    Route::get('setting/holiday', [HolidayController::class, 'index'])->name('setting_holiday');
    Route::post('setting/holiday/update', [HolidayController::class, 'update'])->name('setting_holiday_update');
    
});