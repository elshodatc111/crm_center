<?php

namespace App\Http\Controllers\admin\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SettingService;
use App\Http\Requests\SettingCreateroomRequest;
class RoomSettingController extends Controller{
    private SettingService $settingService;

    public function __construct(SettingService $settingService){
        $this->settingService = $settingService;
        $this->middleware('admin');
    }

    public function index(){
        $rooms = $this->settingService->getRooms();
        return view('admin.setting.rooms.index',compact('rooms'));
    }

    public function store(SettingCreateroomRequest $request){
        $this->settingService->createRoom($request->validated());
        return redirect()->back()->with('success', 'Yangi xona saqlandi');
    }

    public function delete(Request $request){
        $this->settingService->roomDelete($request->id);
        return redirect()->back()->with('success', 'Xona o\'chirildi!');
    }
}
