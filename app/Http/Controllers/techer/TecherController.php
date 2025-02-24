<?php

namespace App\Http\Controllers\techer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TecherService;
use App\Services\StudentService;
use App\Http\Requests\TeacherRequest;

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
        return view('techer.show');
    }

}
