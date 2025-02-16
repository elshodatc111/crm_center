<?php

namespace App\Http\Controllers\admin\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HolidayRequest;
use App\Models\Holiday;
use App\Services\HolidayService;

class HolidayController extends Controller{

    private HolidayService $holidayService;

    public function __construct(HolidayService $holidayService){
        $this->holidayService = $holidayService;
    }

    public function index(){
        $all = $this->holidayService->getAll();
        return view('admin.setting.holiday.index',compact('all'));
    }

    public function update(){
        $this->holidayService->updateHolidays(auth()->id());
        return redirect()->back()->with('success', 'Bayram va dam olish kunlari yangilandi!');
    }

}
