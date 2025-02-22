<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\sadmin\sSettingController;
use App\Http\Controllers\sadmin\sSmsSettingController;
use App\Http\Controllers\sadmin\sTimeController;
use App\Http\Controllers\sHududSettingController;
use App\Http\Controllers\admin\setting\HolidayController;
use App\Http\Controllers\admin\setting\SmsSettingController;
use App\Http\Controllers\admin\setting\PaymartSettingController;
use App\Http\Controllers\admin\setting\ChegirmaSettingController;
use App\Http\Controllers\admin\setting\RoomSettingController;
use App\Http\Controllers\admin\cours\CoursController;
use App\Http\Controllers\admin\cours\TestController;
use App\Http\Controllers\admin\cours\VideoController;
use App\Http\Controllers\student\StudentController;
use App\Http\Controllers\student\GroupsController;
use App\Http\Controllers\paymarts\AddPaymartController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'meneger'])->prefix('meneger')->group(function () {
    Route::get('student', [StudentController::class, 'index'])->name('all_student'); 
    Route::get('/check-phone-exist', [StudentController::class, 'checkPhoneExist'])->name('checkPhoneExist');
    Route::post('/student/create', [StudentController::class, 'store'])->name('student_store');
    Route::get('/student/show/{id}', [StudentController::class, 'show'])->name('student_show');
    Route::post('/student/update/about', [StudentController::class, 'update_about'])->name('student_update_about');
    Route::post('/student/update/password', [StudentController::class, 'update_password'])->name('student_update_password');
    Route::post('/student/update/student', [StudentController::class, 'update'])->name('student_update');
    Route::post('/student/add/group', [StudentController::class, 'addGroups'])->name('student_add_group');

    Route::post('/student/add/pay', [AddPaymartController::class, 'store'])->name('student_add_paymart');

    
    Route::get('groups', [GroupsController::class, 'index'])->name('all_groups'); 
    Route::post('groups/create', [GroupsController::class, 'store'])->name('create_groups'); 
    Route::get('groups/{id}', [GroupsController::class, 'show'])->name('create_show'); 
    Route::post('groups/update', [GroupsController::class, 'update'])->name('create_groups_update'); 
    Route::post('groups/remove/user', [GroupsController::class, 'removeUser'])->name('create_groups_remove_user'); 
});

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

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('setting/holiday', [HolidayController::class, 'index'])->name('setting_holiday');
    Route::post('setting/holiday/update', [HolidayController::class, 'update'])->name('setting_holiday_update');
    Route::get('setting/sms', [SmsSettingController::class, 'index'])->name('setting_sms');
    Route::post('/setting/sms/update', [SmsSettingController::class, 'update'])->name('settings_sms_update');
    Route::get('setting/paymart', [PaymartSettingController::class, 'index'])->name('setting_paymart');
    Route::post('/setting/paymart/create', [PaymartSettingController::class, 'store'])->name('settings_paymart_create');
    Route::post('/setting/paymart/update', [PaymartSettingController::class, 'update'])->name('settings_paymart_update');
    Route::get('setting/chegirma', [ChegirmaSettingController::class, 'index'])->name('setting_chegirma');
    Route::post('/setting/chegirma/create', [ChegirmaSettingController::class, 'store'])->name('setting_chegirma_create');
    Route::post('/setting/chegirma/update', [ChegirmaSettingController::class, 'update'])->name('setting_chegirma_update');
    Route::get('setting/rooms', [RoomSettingController::class, 'index'])->name('setting_rooms');
    Route::post('/setting/rooms/create', [RoomSettingController::class, 'store'])->name('setting_room_create');
    Route::post('/setting/rooms/delete', [RoomSettingController::class, 'delete'])->name('setting_room_delete');
    Route::get('setting/cours', [CoursController::class, 'index'])->name('setting_cours');
    Route::post('setting/cours/create', [CoursController::class, 'store'])->name('setting_cours_create');
    Route::post('setting/cours/update', [CoursController::class, 'update'])->name('setting_cours_update');
    Route::get('setting/test/{id}', [TestController::class, 'index'])->name('setting_cours_test');
    Route::post('setting/test/create', [TestController::class, 'store'])->name('setting_test_create');
    Route::post('setting/test/delete', [TestController::class, 'delete'])->name('setting_test_delete');
    Route::get('setting/video/{id}', [VideoController::class, 'index'])->name('setting_cours_video');
    Route::post('setting/video/create', [VideoController::class, 'store'])->name('setting_video_create');
    Route::post('setting/video/delete', [VideoController::class, 'delete'])->name('setting_video_delete');

    
    Route::get('social', [sHududSettingController::class, 'index'])->name('all_social');
    Route::post('/social/store', [sHududSettingController::class, 'store'])->name('social_store');
    Route::DELETE('/social/delete/{id}', [sHududSettingController::class, 'destroy'])->name('social_delete'); 
});

