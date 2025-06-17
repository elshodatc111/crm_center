<?php

namespace App\Http\Controllers\admin\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HolidayRequest;
use App\Models\Holiday;
use App\Services\HolidayService;
use App\Http\Requests\StoreHolidayAddRequest;

class HolidayController extends Controller{

    private HolidayService $holidayService;

    public function __construct(HolidayService $holidayService){
        $this->holidayService = $holidayService;
    }

    public function index(){
        $all = $this->holidayService->getAll()->sortBy('date');
        return view('admin.setting.holiday.index',compact('all'));
    }

    public function update(){
        $this->holidayService->updateHolidays(auth()->id());
        return redirect()->back()->with('success', 'Bayram va dam olish kunlari yangilandi!');
    }

    public function create(StoreHolidayAddRequest $request){
        $validate = $request->validated();
        $validate['user_id'] = auth()->user()->id;
        Holiday::create($validate);
        return redirect()->back()->with('success', 'Dam olish kuni saqlandi!');
    }

    public function delete(Request $request){
        $id = $request->id;
        $Holiday = Holiday::find($id);
        $Holiday->delete();
        return redirect()->back()->with('success', 'Dam olish kuni o\'chirildi!');
    }

}
