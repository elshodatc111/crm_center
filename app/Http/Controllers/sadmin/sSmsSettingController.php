<?php

namespace App\Http\Controllers\sadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\sadmin\MessageStatusRequest;
use App\Http\Requests\sadmin\MessageMavjudRequest;

class sSmsSettingController extends Controller{
    public function __construct(){
        $this->middleware('sadmin');
    }

    public function index(){
        $Setting = Setting::first();
        return view('sadmin.sms',compact('Setting'));
    }

    public function message_status(MessageStatusRequest $request){
        $Setting = Setting::first();
        $Setting->message_status = $request->status;
        $Setting->save();
        return back()->with('success', 'Xabar holati yangilandi.');
    }

    public function message_mavjud(MessageMavjudRequest $request){
        $Setting = Setting::first();
        $Setting->message_mavjud = $Setting->message_mavjud + $request->message_mavjud;
        $Setting->save();
        return back()->with('success', 'Xabar mavjud soni yangilandi.');
    }

}
