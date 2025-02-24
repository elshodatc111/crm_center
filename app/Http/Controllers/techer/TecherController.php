<?php

namespace App\Http\Controllers\techer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TecherService;
use App\Services\StudentService;
use App\Http\Requests\TeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;

class TecherController extends Controller{
    private StudentService $studentService;
    private TecherService $techerService;

    public function __construct(StudentService $studentService, TecherService $techerService ){
        $this->studentService = $studentService;
        $this->techerService = $techerService;
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
        //dd($techer);
        return view('techer.show',compact('techer'));
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

}
