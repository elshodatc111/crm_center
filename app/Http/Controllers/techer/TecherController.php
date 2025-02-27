<?php

namespace App\Http\Controllers\techer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TecherService;
use App\Services\StudentService;
use App\Services\SettingService;
use App\Http\Requests\TeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Http\Requests\TecherPaymartRequest;

class TecherController extends Controller{
    private StudentService $studentService;
    private TecherService $techerService;
    private SettingService $settingService;

    public function __construct(StudentService $studentService, TecherService $techerService, SettingService $settingService){
        $this->studentService = $studentService;
        $this->techerService = $techerService;
        $this->settingService = $settingService;
    }

    public function index(){
        $User = $this->techerService->allTecher();
        $addres = $this->studentService->getAddres();
        return view('techer.index',compact('User','addres'));
    }

    public function store(TeacherRequest $request){
        $this->techerService->create($request->validated());
        return redirect()->back()->with('success', 'O‘qituvchi muvaffaqiyatli qo‘shildi.');
    }

    public function show($id){ 
        $techer = $this->techerService->techerShow($id);
        $groups = $this->techerService->techerGroups($id);
        $balans = $this->settingService->getSetting();
        $paymart = $this->techerService->techerPaymart($id);
        //dd($paymart);
        return view('techer.show',compact('techer','groups','balans','paymart'));
    }

    public function techerUpdate(UpdateTeacherRequest $request){
        $this->techerService->update($request->validated());
        return redirect()->back()->with('success', 'O‘qituvchi malumotlari yangilandi.');
    }

    public function techerStatus(Request $request){
        $status = $this->techerService->UpdateStaus($request->techer_id);
        if($status){
            return redirect()->back()->with('success', 'O‘qituvchi ishga olindi.');
        }else{
            return redirect()->back()->with('success', 'O‘qituvchi ishdan bo\'shatildi.');
        }
    }

    public function PaymartStory(TecherPaymartRequest $request){
        $validatedData = $request->validated();
        if ($this->techerService->check($validatedData)) {
            $this->techerService->PaymartStore($validatedData);
            return redirect()->back()->with('success', "Ish haqi to'lovi amalga oshirildi.");
        }
        return redirect()->back()->with('error', "Balansda yetarli mablag' mavjud emas.");
    }

}
