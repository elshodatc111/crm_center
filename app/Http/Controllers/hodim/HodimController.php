<?php

namespace App\Http\Controllers\hodim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HodimCreateRequest;
use App\Http\Requests\HodimUpdateRequest;
use App\Http\Requests\PaymentHodimRequest;
use App\Services\StudentService;
use App\Services\HodimService;
use App\Services\SettingService;

class HodimController extends Controller{
    protected $hodimService;
    protected $studentService;
    protected $settingService;

    public function __construct(HodimService $hodimService, StudentService $studentService,SettingService $settingService){
        $this->hodimService = $hodimService;
        $this->studentService = $studentService;
        $this->settingService = $settingService;
    }

    public function index(){
        $user = $this->hodimService->allHodim();
        $addres = $this->studentService->getAddres();
        return view('hodim.index',compact('user','addres'));
    }

    public function createHodim(HodimCreateRequest $request){
        $this->hodimService->create($request->validated());
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
        $check = $this->hodimService->hodimPaymartCheck($request->validated());
        if($check){
            $this->hodimService->hodimPaymartStore($request->validated());
            return redirect()->back()->with('success', 'Ish haqi to\'lov amalga oshirildi!');
        }else{
            return redirect()->back()->with('success', 'Balansda yetarli mablag\' mavjud emas!');
        }
    }

}
