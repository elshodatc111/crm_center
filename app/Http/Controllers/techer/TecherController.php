<?php

namespace App\Http\Controllers\techer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TecherService;
use App\Services\StudentService;
use App\Services\SettingService;
use App\Models\User;
use App\Services\message\SendMessageEndService;
use App\Http\Requests\TeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Http\Requests\TecherPaymartRequest;

class TecherController extends Controller{
    private SendMessageEndService $sendMessageEndService;
    private StudentService $studentService;
    private TecherService $techerService;
    private SettingService $settingService;

    public function __construct(StudentService $studentService, SendMessageEndService $sendMessageEndService, TecherService $techerService, SettingService $settingService){
        $this->studentService = $studentService;
        $this->techerService = $techerService;
        $this->settingService = $settingService;
        $this->sendMessageEndService = $sendMessageEndService;
    }

    public function index(){
        $User = $this->techerService->allTecher();
        $addres = $this->studentService->getAddres();
        return view('techer.index',compact('User','addres'));
    }

    public function store(TeacherRequest $request){
        $users = $this->techerService->create($request->validated());
        $user_id = $this->techerService->userID($request->validated()); 
        $message = "Hurmatli ".$request->user_name." ".config('app.APP_NAME')." o'quv markazimizga ishga olindingiz. Login:".User::find($user_id)->email." parol: password";
        $this->sendMessageEndService->SendMessage($user_id, $message, 'pay_hodim_sms');
        return redirect()->back()->with('success', 'O‘qituvchi muvaffaqiyatli qo‘shildi.');
    }

    public function show($id){ 
        $techer = $this->techerService->techerShow($id);
        $groups = $this->techerService->techerGroups($id);
        $balans = $this->settingService->getSetting();
        $paymart = $this->techerService->techerPaymart($id); 
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
            $message = "Sizga ".$request->amount." so'm ish haqi to'landi. ";
            $this->sendMessageEndService->SendMessage($request->techer_id, $message, 'pay_hodim_sms');
            return redirect()->back()->with('success', "Ish haqi to'lovi amalga oshirildi.");
        }
        return redirect()->back()->with('error', "Balansda yetarli mablag' mavjud emas.");
    }

    public function techerUpdatePassword(Request $request){
        $this->techerService->updatePassword($request->techer_id);
        $message = "Sizning yangi parolingiz: password ";
        $this->sendMessageEndService->SendMessage($request->techer_id, $message, 'update_pass_sms');
        return redirect()->back()->with('success', "Hodim paroli yangilandi.");
    }
}
