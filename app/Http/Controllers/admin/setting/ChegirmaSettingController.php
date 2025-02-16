<?php

namespace App\Http\Controllers\admin\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SettingService;
use App\Models\SettingChegirma;
use App\Http\Requests\StoreSettingChegirmaRequest;

class ChegirmaSettingController extends Controller{


    private SettingService $settingService;

    public function __construct(SettingService $settingService){
        $this->settingService = $settingService;
        $this->middleware('admin');
    }


    public function index(){
        $chegirma = $this->settingService->getChegirma();
        return view('admin.setting.chegirma.index',compact('chegirma'));
    }

    public function store(StoreSettingChegirmaRequest $request){
        $this->settingService->createChegirma($request->validated());
        return redirect()->back()->with('success', 'Ma’lumotlar saqlandi!');
    }
    public function update(Request $request){
        $this->settingService->chegirmaUpdate($request->id);
        return redirect()->back()->with('success', 'Chegirma o\'chirildi!');
    }
}
