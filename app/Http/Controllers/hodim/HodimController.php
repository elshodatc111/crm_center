<?php

namespace App\Http\Controllers\hodim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\HodimCreateRequest;
use App\Http\Requests\HodimUpdateRequest;
use App\Services\StudentService;
use App\Services\HodimService;

class HodimController extends Controller{
    protected $hodimService;
    protected $studentService;

    public function __construct(HodimService $hodimService, StudentService $studentService){
        $this->hodimService = $hodimService;
        $this->studentService = $studentService;
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
        //dd($user_chart);
        return view('hodim.show',compact('user','user_chart'));
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

}
