<?php

namespace App\Http\Controllers\hodim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HodimCreateRequest;
use App\Http\Requests\HodimUpdateRequest;
use App\Http\Requests\PaymentHodimRequest;
use App\Services\StudentService;
use App\Services\HodimService;
use App\Models\User;
use App\Services\SettingService;
use App\Services\message\SendMessageEndService;

class HodimController extends Controller{
    protected $hodimService;
    protected $studentService;
    protected $settingService;
    protected $sendMessageEndService;

    public function __construct(HodimService $hodimService,SendMessageEndService $sendMessageEndService, StudentService $studentService,SettingService $settingService){
        $this->hodimService = $hodimService;
        $this->studentService = $studentService;
        $this->settingService = $settingService;
        $this->sendMessageEndService = $sendMessageEndService;
    }

    public function index(){
        $user = $this->hodimService->allHodim();
        $addres = $this->studentService->getAddres();
        return view('hodim.index',compact('user','addres'));
    }

    public function createHodim(HodimCreateRequest $request){
        $validate = $request->validated();
        $users = $this->hodimService->create($validate);
        $user_id = $this->hodimService->userID($validate);
        $message = "Hurmatli ".$request->user_name." ".config('app.APP_NAME')." o'quv markazimizga ishga olindingiz. Login:".User::find($user_id)->email." parol: password";
        $this->sendMessageEndService->SendMessage($user_id, $message, 'pay_hodim_sms');
        return redirect()->back()->with('success', 'Yangi hodim ishga olindi!');
    }

    public function show($id){
        $this->hodimService->checkUser($id);
        $user = $this->hodimService->userShow($id);
        $user_chart = $this->hodimService->userCart($id);
        $balans = $this->settingService->getSetting();
        $paymart = $this->hodimService->getPaymart($id);
        //dd($paymart);
        return view('hodim.show',compact('user','user_chart','balans','paymart'));
    }

    public function chartClear(Request $request){
        $this->hodimService->chartClear($request->user_id);
        return redirect()->back()->with('success', 'Hodim statistikasi tozalandi!');
    }

    public function updateStore(HodimUpdateRequest $request){
        $this->hodimService->updateUser($request->validated());
        return redirect()->back()->with('success', 'Hodim ma\'lumotlari yangilandi!');
    }

    public function updateStatus(Request $request){
        $this->hodimService->updateStatuss($request->user_id, $request->status);
        return redirect()->back()->with('success', 'Hodim statusi yangilandi!');
    }

    public function paymartStory(PaymentHodimRequest $request){
        $user_id = intval($request->user_id);
        $check = $this->hodimService->hodimPaymartCheck($request->validated());
        if($check){
            $patmart_id = $this->hodimService->hodimPaymartStore($request->validated());
            $message = "Sizga ".$request->amount." so'm ish haqi to'landi. ";
            $this->sendMessageEndService->SendMessage($user_id, $message, 'pay_hodim_sms');
            return redirect()->back()->with('success', 'Ish haqi to\'lov amalga oshirildi!');
        }else{
            return redirect()->back()->with('success', 'Balansda yetarli mablag\' mavjud emas!');
        }
    }

}
