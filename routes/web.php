<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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
use App\Http\Controllers\techer\TecherController;
use App\Http\Controllers\kassa\KassaController;
use App\Http\Controllers\moliya\MoliyaController;
use App\Http\Controllers\hodim\HodimController;
use App\Http\Controllers\varonka\VaronkaController;
use App\Http\Controllers\varonka\VaronkaMenegerController;
use App\Http\Controllers\chart\ChartController;
use App\Http\Controllers\report\ReportController;

Auth::routes();



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/varonka/user/{visited}', [VaronkaController::class, 'user'])->name('user_varonka');
Route::post('/varonka/register', [VaronkaController::class, 'register'])->name('user_varonka_varonka');
Route::get('/varonka/success', [VaronkaController::class, 'success'])->name('user_varonka_success');

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
    Route::post('/student/add/return', [StudentController::class, 'returnPaymarts'])->name('student_return_paymart');
    Route::post('/student/chegirma', [StudentController::class, 'discountPayment'])->name('student_bayram_chegirma');
    Route::get('groups', [GroupsController::class, 'index'])->name('all_groups'); 
    Route::post('groups/create', [GroupsController::class, 'store'])->name('create_groups'); 
    Route::get('groups/{id}', [GroupsController::class, 'show'])->name('create_show'); 
    Route::post('groups/update', [GroupsController::class, 'update'])->name('create_groups_update'); 
    Route::post('groups/remove/user', [GroupsController::class, 'removeUser'])->name('create_groups_remove_user'); 
    Route::post('groups/next/store', [GroupsController::class, 'newStore'])->name('create_groups_next_store'); 
    Route::post('groups/debet/message', [AddPaymartController::class, 'debetMessage'])->name('groups_debet_message'); 
    Route::get('/kassa', [KassaController::class, 'index'])->name('compamy_kassa');
    Route::post('/kassa/chiqim', [KassaController::class, 'chiqim'])->name('compamy_kassa_chiqim');
    Route::post('/kassa/xarajat', [KassaController::class, 'xarajat'])->name('compamy_kassa_xarajat');
    Route::post('/kassa/delete', [KassaController::class, 'delete'])->name('compamy_kassa_delete');
    Route::post('/kassa/success', [KassaController::class, 'success'])->name('compamy_kassa_success');
    Route::get('/varonka/meneger', [VaronkaMenegerController::class, 'index'])->name('meneger_varonka');
    Route::get('/varonka/new', [VaronkaMenegerController::class, 'newAll'])->name('meneger_varonka_new');
    Route::get('/varonka/pedding', [VaronkaMenegerController::class, 'newPedding'])->name('meneger_varonka_pedding');
    Route::get('/varonka/success', [VaronkaMenegerController::class, 'newSuccess'])->name('meneger_varonka_success');
    Route::get('/varonka/cancel', [VaronkaMenegerController::class, 'newCancel'])->name('meneger_varonka_cancel');
    Route::get('/varonka/show/{id}', [VaronkaMenegerController::class, 'show'])->name('meneger_varonka_show');
    Route::post('/varonka/user/cancel', [VaronkaMenegerController::class, 'cancelVaronka'])->name('meneger_varonka_cancel_post');
    Route::post('/varonka/user/comments', [VaronkaMenegerController::class, 'commentsVaronka'])->name('meneger_varonka_comments_post');
    Route::post('/varonka/user/register', [VaronkaMenegerController::class, 'register'])->name('meneger_varonka_register_post');

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

    Route::get('student/return', [StudentController::class, 'returnPay'])->name('all_student_return'); 
    Route::post('student/return/delete', [StudentController::class, 'returnPayDel'])->name('all_student_return_del'); 

    
    Route::get('s/uploadUser', [sSettingController::class, 'uploadUser'])->name('sadmin_upload_user');
    Route::post('/upload-excel', [sSettingController::class, 'uploadExcel'])->name('upload.excel');
    Route::post('/upload-trash', [sSettingController::class, 'trashExcel'])->name('trash.excel');
    Route::post('/upload-run', [sSettingController::class, 'runExcel'])->name('run.excel');
    
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
    Route::post('/student/admin/chegirma', [StudentController::class, 'chegirmaAdmin'])->name('student_admin_chegirma');
    Route::get('/techers', [TecherController::class, 'index'])->name('all_techer');
    Route::post('/techers/create', [TecherController::class, 'store'])->name('techer_create');
    Route::post('/techers/update', [TecherController::class, 'techerUpdate'])->name('techer_update');
    Route::post('/techers/update/password', [TecherController::class, 'techerUpdatePassword'])->name('techer_update_password');
    Route::post('/techers/status', [TecherController::class, 'techerStatus'])->name('techer_status');
    Route::get('/techer/{id}', [TecherController::class, 'show'])->name('techer_show');
    Route::post('/techers/paymart', [TecherController::class, 'PaymartStory'])->name('techer_paymart');
    Route::get('/moliya', [MoliyaController::class, 'index'])->name('compamy_moliya');
    Route::post('/moliya/updateExson', [MoliyaController::class, 'updateExson'])->name('compamy_updateExson');
    Route::post('/moliya/chiqim', [MoliyaController::class, 'balansChiqim'])->name('compamy_moliya_chiqim');
    Route::post('/moliya/xarajat', [MoliyaController::class, 'xarajatBalans'])->name('compamy_moliya_xarajat');
    Route::get('/hodimlar', [HodimController::class, 'index'])->name('compamy_hodim');
    Route::post('/hodim/create', [HodimController::class, 'createHodim'])->name('compamy_hodim_create');
    Route::get('/hodim/show/{id}', [HodimController::class, 'show'])->name('compamy_hodim_show');
    Route::post('/hodim/chart/clear', [HodimController::class, 'chartClear'])->name('compamy_hodim_chart_clear');
    Route::post('/hodim/update', [HodimController::class, 'updateStore'])->name('compamy_hodim_techer_update');
    Route::post('/hodim/update/status', [HodimController::class, 'updateStatus'])->name('compamy_hodim_techer_update_status');
    Route::post('/hodim/paymart/status', [HodimController::class, 'paymartStory'])->name('compamy_hodim_paymart_story');
    Route::get('chart/vised', [ChartController::class, 'vised'])->name('chart_vised');
    Route::get('chart/paymart', [ChartController::class, 'paymart'])->name('chart_paymart');
    Route::get('chart/paymarts/{data}', [ChartController::class, 'paymart_show'])->name('chart_paymart_show');
    Route::get('chart/techer', [ChartController::class, 'techer'])->name('chart_techer');
    Route::get('chart/techerReyting', [ChartController::class, 'techerReyting'])->name('chart_techer_reyting');

    
    Route::get('chart/techerReytingTwo', [ChartController::class, 'techerReytingTwo'])->name('chart_techer_reyting_two');

    Route::get('report/users', [ReportController::class, 'users'])->name('report_users');
    Route::get('report/users_next', [ReportController::class, 'users_next'])->name('report_users_next');
    Route::get('report/paymart', [ReportController::class, 'paymart'])->name('report_paymart');
    Route::get('report/paymart_next', [ReportController::class, 'paymart_next'])->name('report_paymart_next');
    Route::get('report/group', [ReportController::class, 'group'])->name('report_group');
    Route::get('report/group_next', [ReportController::class, 'group_next'])->name('report_group_next');
    Route::get('report/message', [ReportController::class, 'message'])->name('report_message');
    Route::get('report/message_next', [ReportController::class, 'message_next'])->name('report_message_next');
    
});

