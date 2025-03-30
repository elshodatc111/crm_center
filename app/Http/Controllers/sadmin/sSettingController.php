<?php

namespace App\Http\Controllers\sadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserHistory;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SadminUpdateNameRequest;
use App\Http\Requests\SadminUpdateStatusRequest;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use App\Services\upload\UploadService;



class sSettingController extends Controller{
    private UploadService $uploadService;
    public function __construct(UploadService $uploadService){
        $this->uploadService = $uploadService;
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

    public function uploadUser(){
        $getFiles = $this->uploadService->getFiles();
        return view('admin.upload.index',compact('getFiles'));
    }

    public function uploadExcel(Request $request){
        $filePath = $this->uploadService->uploadExcel($request);
        return back()->with('success', 'Fayl muvaffaqiyatli yuklandi!')->with('filePath', $filePath);
    }

    public function trashExcel(Request $request){
        $this->uploadService->trashUplads($request->id);
        return redirect()->back()->with('success', 'Bekor qilindi.');
    }

    public function runExcel(Request $request){
        $this->uploadService->runUplads($request->id);
        return redirect()->back()->with('success', 'Bajarildi.');
    }


} 
