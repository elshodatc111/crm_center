<?php

namespace App\Http\Controllers\admin\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Services\SettingService;
use App\Http\Requests\SettingSmsUpdateRequest;

class SmsSettingController extends Controller{
    private SettingService $settingService;

    public function __construct(SettingService $settingService){
        $this->settingService = $settingService;
        $this->middleware('admin');
    }
    
    public function index(){
        $setting = $this->settingService->getSetting();
        return view('admin.setting.sms.index',compact('setting'));
    }

    public function update(SettingSmsUpdateRequest $request){
        $updated = $this->settingService->updateSettings($request->validated());
        if ($updated) {
            return redirect()->back()->with('success', 'O‘zgarishlar saqlandi!');
        } else {
            return redirect()->back()->with('error', 'Ma’lumotlar yangilashda xatolik!');
        }
    }

}
