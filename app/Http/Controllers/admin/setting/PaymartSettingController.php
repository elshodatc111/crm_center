<?php

namespace App\Http\Controllers\admin\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SettingService;
use App\Http\Requests\SettingPaymartRequest;
use App\Models\SettingPaymart;


class PaymartSettingController extends Controller{

    private SettingService $settingService;

    public function __construct(SettingService $settingService){
        $this->settingService = $settingService;
        $this->middleware('admin');
    }

    public function index(){
        $activPaymart = $this->settingService->getPaymart();
        $deletePaymart = $this->settingService->getPaymartDelete();
        return view('admin.setting.paymart.index',compact('activPaymart','deletePaymart'));
    }

    public function store(SettingPaymartRequest $request){
        $this->settingService->createPaymart($request->validated());
        return redirect()->back()->with('success', 'Yangi to\'lov qo\'shildi.');
    }

    public function update(Request $request){
        $SettingPaymart = SettingPaymart::find($request->id);
        $SettingPaymart->status = 'delete';
        $SettingPaymart->save();
        return redirect()->back()->with('success', 'To\'lov o\'chirildi.');
    }

}
