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
use App\Jobs\SendMessageWork;
use App\Jobs\PaymartMessageWork;

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
        $users = $this->techerService->create($request->validated());
        $user_id = $this->techerService->userID($request->validated());
        dispatch(new SendMessageWork($user_id, 'new_hodim_sms',auth()->user()->id));
        return redirect()->back()->with('success', 'O‘qituvchi muvaffaqiyatli qo‘shildi.');
    }

    public function show($id){ 
        $techer = $this->techerService->techerShow($id);
        $groups = $this->techerService->techerGroups($id);
        $balans = $this->settingService->getSetting();
        $paymart = $this->techerService->techerPaymart($id); 
        dd($groups);
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
            $patmart_id = $this->techerService->PaymartStore($validatedData);
            dispatch(new PaymartMessageWork($patmart_id, 'techer', $validatedData['techer_id'], auth()->user()->id, 'pay_hodim_sms'));
            return redirect()->back()->with('success', "Ish haqi to'lovi amalga oshirildi.");
        }
        return redirect()->back()->with('error', "Balansda yetarli mablag' mavjud emas.");
    }

    public function techerUpdatePassword(Request $request){
        $this->techerService->updatePassword($request->techer_id);
        dispatch(new SendMessageWork($request->techer_id, 'update_pass_sms',auth()->user()->id));
        return redirect()->back()->with('success', "Hodim paroli yangilandi.");
    }
}
