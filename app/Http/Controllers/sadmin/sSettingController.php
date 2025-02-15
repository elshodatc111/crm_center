<?php

namespace App\Http\Controllers\sadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\SadminUpdateNameRequest;
use App\Http\Requests\SadminUpdateStatusRequest;

class sSettingController extends Controller{
    public function __construct(){
        $this->middleware('sadmin');
    }
    public function index(){
        $Setting = Setting::first();
        return view('sadmin.index',compact('Setting'));
    }
    public function update_name(SadminUpdateNameRequest $request){
        $setting = Setting::first();
        $setting->update(['name' => $request->name]);
        return redirect()->back()->with('success', 'Nomi yangilandi.');
    }
    public function update_status(SadminUpdateStatusRequest $request){
        $setting = Setting::first();
        $setting->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Status yangilandi.');
    }
}
